<?php
// src/Services/ApiService.php
namespace SDKSimpleFactura\Services;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IAuthenticationService;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Utils\Serializer as Serializador;

class ApiService implements IApiService
{
    private Client $httpClient;
    private Serializer $serializer;
    private IAuthenticationService $authService;

    public function __construct($config, IAuthenticationService $authService)
    {
        $this->authService = $authService;

        // Middleware que inyecta el token Bearer en cada request.
        $stack = HandlerStack::create();
        $stack->push(Middleware::mapRequest(function (RequestInterface $request) {
            $token = $this->authService->getToken();
            return $request->withHeader('Authorization', 'Bearer ' . $token);
        }));

        $this->httpClient = new Client([
            'base_uri' => $config['BaseUrl'],
            'timeout' => 300,
            'handler' => $stack,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'verify' => __DIR__ . '/../../cacert.pem', // Ruta al archivo cacert.pem
        ]);
        $objectNormalizer = new ObjectNormalizer(null, null, null, null, null, null, [
            ObjectNormalizer::ALLOW_EXTRA_ATTRIBUTES => true, // Ignora atributos desconocidos
        ]);
        $this->serializer = new Serializer([$objectNormalizer, new ArrayDenormalizer()], [new JsonEncoder()]);
    }

    public function PostAsync(string $url, $request, ?string $responseClass = null): PromiseInterface
    {
        $serializedRequest = Serializador::serializeToJson($request);
        return $this->httpClient->postAsync($url, [
            'body' => $serializedRequest,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ])->then(
            function ($response) use ($responseClass) {
                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);
                if ($responseClass === 'string' || $responseClass === 'int') {
                    $mappedData = $data['data'] ?? '';
                } elseif ($responseClass === 'int') {
                    $mappedData = isset($data['data']) ? (int) $data['data'] : 0;
                } elseif ($responseClass === 'boolean') {
                    $mappedData = isset($data['data']) ? (bool) $data['data'] : false;
                } else {
                    $mappedData = $responseClass && isset($data['data']) && $data['data'] !== null
                        ? (is_array($data['data']) && isset($data['data'][0]) && array_keys($data['data']) === range(0, count($data['data']) - 1)
                            ? $this->serializer->deserialize(json_encode($data['data']), $responseClass . '[]', 'json')
                            : $this->serializer->deserialize(json_encode($data['data']), $responseClass, 'json'))
                        : $data['data'];
                }
                return new Response(
                    $data['status'],
                    $mappedData,
                    $data['message'] ?? '',
                    $data['errors'] ?? []
                );
            },
            function (RequestException $e) {
                $errorMessage = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
                $data = json_decode($errorMessage, true);
                return new Response(
                    $data['status'] ?? 500,
                    $data['data'] ?? null,
                    $data['message'] ?? 'Error interno',
                    $data['errors'] ?? []
                );
            }
        );
    }

    public function PostForByteArrayAsync(string $url, $request): PromiseInterface
    {
        $serializedRequest = Serializador::serializeToJson($request);

        return $this->httpClient->postAsync($url, [
            'body' => $serializedRequest,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ])->then(
            function ($response) {
                $body = $response->getBody()->getContents();
                return new Response(
                    200,
                    $body,
                    'Success',
                    []
                );
            },
            function (RequestException $e) {
                $errorMessage = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
                $data = json_decode($errorMessage, true);
                return new Response(
                    $data['status'] ?? 500,
                    $data['data'] ?? null,
                    $data['message'] ?? 'Error interno',
                    $data['errors'] ?? []
                );
            }
        );
    }


    public function PostAsyncMultipart(string $url, array $multipart): PromiseInterface
    {
        return $this->httpClient->postAsync($url, [
            'multipart' => $multipart,

        ])->then(

            function ($response) {
                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);

                // Verificar si la decodificación del JSON fue exitosa
                if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                    throw new \RuntimeException('Error al decodificar JSON: ' . json_last_error_msg());
                }

                return new Response(
                    $data['status'],
                    $data['data'] ?? null, // Devolver el `data` tal cual
                    $data['message'] ?? '',
                    $data['errors'] ?? []
                );
            },
            function (RequestException $e) {
                $errorMessage = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
                $data = json_decode($errorMessage, true);
                return new Response(
                    $data['status'] ?? 500,
                    null,
                    $data['message'] ?? 'Error interno',
                    $data['errors'] ?? []
                );
            }
        );
    }

    public function GetAsync(string $url, ?string $responseClass = null): PromiseInterface
    {
        return $this->httpClient->getAsync($url)->then(
            function ($response) use ($responseClass) {
                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);
                if ($responseClass === 'string' || $responseClass === 'int') {
                    $mappedData = $data['data'] ?? '';
                } elseif ($responseClass === 'boolean') {
                    $mappedData = isset($data['data']) ? (bool) $data['data'] : false;
                } else {
                    $mappedData = $responseClass && isset($data['data']) && $data['data'] !== null
                        ? (is_array($data['data']) && isset($data['data'][0]) && array_keys($data['data']) === range(0, count($data['data']) - 1)
                            ? $this->serializer->deserialize(json_encode($data['data']), $responseClass . '[]', 'json')
                            : $this->serializer->deserialize(json_encode($data['data']), $responseClass, 'json'))
                        : ($data['data'] ?? null);
                }
                return new Response(
                    $data['status'] ?? 200,
                    $mappedData,
                    $data['message'] ?? '',
                    $data['errors'] ?? []
                );
            },
            function (RequestException $e) {
                $errorMessage = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
                $data = json_decode($errorMessage, true);
                return new Response(
                    $data['status'] ?? 500,
                    $data['data'] ?? null,
                    $data['message'] ?? 'Error interno',
                    $data['errors'] ?? []
                );
            }
        );
    }
}
