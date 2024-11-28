<?php
// src/Services/ApiService.php
namespace SDKSimpleFactura\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Utils\Serializer as Serializador; // Asegúrate de incluir esta referencia

class ApiService implements IApiService
{
    private Client $httpClient;
    private Serializer $serializer;

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
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function PostAsync(string $url, $request, ?string $responseClass = null): PromiseInterface
    {
        $serializedRequest = Serializador::serializeToJson($request);
        print_r($serializedRequest);
        return $this->httpClient->postAsync($url, [
            'body' => $serializedRequest,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ])->then(
            function ($response) use ($responseClass) {
                $body = $response->getBody()->getContents();
                //print_r($body);
                $data = json_decode($body, true);
                print_r($data);
                $mappedData = $responseClass && isset($data['data'])
                    ? $this->serializer->deserialize(json_encode($data['data']), $responseClass, 'json')
                    : $data['data'];

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
                    null,
                    $data['message'] ?? 'Error interno',
                    $data['errors'] ?? []
                );
            }
        );
    }

    public function PostForByteArrayAsync(string $url, $request): PromiseInterface
    {
        return $this->httpClient->postAsync($url, [
            'json' => $request,
            'headers' => [
                'Accept' => 'application/json',
            ],
        ])->then(
            function ($response) {
                $body = $response->getBody()->getContents();
                return (object) [
                    'IsSuccess' => true,
                    'Data' => $body,
                ];
            },
            function (RequestException $e) {
                $statusCode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : 0;
                $errorMessage = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();

                return (object) [
                    'IsSuccess' => false,
                    'StatusCode' => $statusCode,
                    'Errores' => $errorMessage,
                ];
            }
        );
    }
}
