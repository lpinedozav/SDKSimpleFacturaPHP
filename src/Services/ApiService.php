<?php

namespace SDKSimpleFactura;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiService
{
    private $httpClient;

    public function __construct()
    {
        // Configura el cliente HTTP con una base URI
        $this->httpClient = new Client([
            'base_uri' => 'https://api.example.com', // Cambia por la URL base de tu API
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Método POST para enviar datos JSON.
     *
     * @param string $url La URL del endpoint.
     * @param array $request El cuerpo de la petición en formato array.
     * @return array Respuesta con éxito o errores.
     */
    public function post(string $url, array $request)
    {
        try {
            $response = $this->httpClient->post($url, [
                'json' => $request,
            ]);

            $responseContent = json_decode($response->getBody(), true);

            return [
                'isSuccess' => true,
                'data' => $responseContent,
            ];
        } catch (RequestException $e) {
            return [
                'isSuccess' => false,
                'statusCode' => $e->getResponse()->getStatusCode(),
                'errores' => $e->getMessage(),
            ];
        }
    }

    /**
     * Método POST para descargar datos binarios (byte array).
     *
     * @param string $url La URL del endpoint.
     * @param array $request El cuerpo de la petición en formato array.
     * @return array Respuesta con datos binarios o errores.
     */
    public function postForByteArray(string $url, array $request)
    {
        try {
            $response = $this->httpClient->post($url, [
                'json' => $request,
            ]);

            $responseContent = $response->getBody()->getContents();

            return [
                'isSuccess' => true,
                'data' => $responseContent,
            ];
        } catch (RequestException $e) {
            return [
                'isSuccess' => false,
                'statusCode' => $e->getResponse()->getStatusCode(),
                'errores' => $e->getMessage(),
            ];
        }
    }

    /**
     * Método POST para enviar datos multipart/form-data.
     *
     * @param string $url La URL del endpoint.
     * @param array $formData El contenido del formulario en formato array.
     * @return array Respuesta con éxito o errores.
     */
    public function postMultipart(string $url, array $formData)
    {
        try {
            $multipart = [];
            foreach ($formData as $name => $value) {
                if (is_array($value) && isset($value['content']) && isset($value['filename'])) {
                    $multipart[] = [
                        'name' => $name,
                        'contents' => fopen($value['content'], 'r'),
                        'filename' => $value['filename'],
                    ];
                } else {
                    $multipart[] = [
                        'name' => $name,
                        'contents' => $value,
                    ];
                }
            }

            $response = $this->httpClient->post($url, [
                'multipart' => $multipart,
            ]);

            $responseContent = json_decode($response->getBody(), true);

            return [
                'isSuccess' => true,
                'data' => $responseContent,
            ];
        } catch (RequestException $e) {
            return [
                'isSuccess' => false,
                'statusCode' => $e->getResponse()->getStatusCode(),
                'errores' => $e->getMessage(),
            ];
        }
    }
}
