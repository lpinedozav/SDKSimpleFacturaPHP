<?php
// src/Services/AuthenticationService.php
namespace SDKSimpleFactura\Services;

use GuzzleHttp\Client;
use SDKSimpleFactura\Interfaces\IAuthenticationService;

/**
 * Gestiona el token JWT de la API (válido ~24h).
 *
 * - Solicita el token a POST /token con {email, password}.
 * - Lo cachea en memoria hasta su expiración y lo renueva automáticamente.
 * - Admite un token pre-cargado vía configuración (AccessToken / ExpiresAt)
 *   para evitar la llamada a /token.
 */
class AuthenticationService implements IAuthenticationService
{
    private Client $httpClient;
    private array $config;
    private string $accessToken = '';
    private ?\DateTimeImmutable $expiresAt = null;

    /** Margen de seguridad: renovar el token 60s antes de que expire. */
    private const SAFETY_MARGIN_SECONDS = 60;

    public function __construct(array $config)
    {
        $this->config = $config;

        // Cliente dedicado SOLO para /token (sin el middleware Bearer, evita recursión).
        $this->httpClient = new Client([
            'base_uri' => $config['BaseUrl'],
            'timeout' => 60,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'verify' => __DIR__ . '/../../cacert.pem',
        ]);

        // Token pre-cargado opcional desde configuración.
        if (!empty($config['AccessToken'])) {
            $this->accessToken = $config['AccessToken'];
            if (!empty($config['ExpiresAt'])) {
                $this->expiresAt = $this->parseDate($config['ExpiresAt']);
            }
        }
    }

    public function getToken(): string
    {
        $now = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));

        if ($this->accessToken !== '' && $this->expiresAt !== null) {
            $safeExpiry = $this->expiresAt->modify('-' . self::SAFETY_MARGIN_SECONDS . ' seconds');
            if ($now < $safeExpiry) {
                return $this->accessToken;
            }
        }

        return $this->requestNewToken();
    }

    private function requestNewToken(): string
    {
        $email = $this->config['Username'] ?? null;
        $password = $this->config['Password'] ?? null;

        $response = $this->httpClient->post('/token', [
            'json' => [
                'email' => $email,
                'password' => $password,
            ],
        ]);

        $body = json_decode($response->getBody()->getContents(), true);
        if (!is_array($body)) {
            throw new \RuntimeException('Respuesta inválida al solicitar el token.');
        }

        $token = $body['accessToken'] ?? $body['AccessToken'] ?? null;
        $expiresAtRaw = $body['expiresAt'] ?? $body['ExpiresAt'] ?? null;

        if (empty($token)) {
            throw new \RuntimeException('No se pudo obtener el token de autenticación: ' . json_encode($body));
        }

        $this->accessToken = $token;
        $this->expiresAt = $expiresAtRaw ? $this->parseDate($expiresAtRaw) : null;

        return $this->accessToken;
    }

    private function parseDate(string $value): ?\DateTimeImmutable
    {
        try {
            return new \DateTimeImmutable($value, new \DateTimeZone('UTC'));
        } catch (\Exception $e) {
            return null;
        }
    }
}
