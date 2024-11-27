<?php
// src/Services/ApiService.php
namespace SDKSimpleFactura\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use SDKSimpleFactura\Interfaces\IApiService;

class ApiService implements IApiService
{
    private $httpClient;

    public function __construct($config)
    {
        $this->httpClient = new Client([
            'base_uri' => $config['BaseUrl'],
            'timeout' => 300,
            'auth' => [$config['Username'], $config['Password']],
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'verify' => __DIR__ . '/../../cacert.pem', // Ruta al archivo cacert.pem
        ]);
    }

    public function postAsync(string $url, $request)
    {
        try {
            $response = $this->httpClient->post($url, [
                'json' => $request,
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            if ($statusCode >= 200 && $statusCode < 300) {
                $data = json_decode($body, true);
                return (object) [
                    'IsSuccess' => true,
                    'Data' => $data,
                ];
            } else {
                return (object) [
                    'IsSuccess' => false,
                    'StatusCode' => $statusCode,
                    'Errores' => $body,
                ];
            }
        } catch (RequestException $e) {
            $statusCode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : 0;
            $errorMessage = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();

            return (object) [
                'IsSuccess' => false,
                'StatusCode' => $statusCode,
                'Errores' => $errorMessage,
            ];
        }
    }

    public function postForByteArrayAsync(string $url, $request)
    {
        try {
            $response = $this->httpClient->post($url, [
                'json' => $request,
                'headers' => [
                    'Accept' => 'application/octet-stream',
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            if ($statusCode >= 200 && $statusCode < 300) {
                return (object) [
                    'IsSuccess' => true,
                    'Data' => $body,
                ];
            } else {
                return (object) [
                    'IsSuccess' => false,
                    'StatusCode' => $statusCode,
                    'Errores' => $body,
                ];
            }
        } catch (RequestException $e) {
            $statusCode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : 0;
            $errorMessage = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();

            return (object) [
                'IsSuccess' => false,
                'StatusCode' => $statusCode,
                'Errores' => $errorMessage,
            ];
        }
    }
}
