<?php
// src/Services/FacturacionService.php
namespace SDKSimpleFactura\Services;

use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Enum\TipoSobreEnvio;

class FacturacionService implements IFacturacionService
{
    private $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function ObtenerPdfDteAsync($solicitud)
    {
        $url = '/dte/pdf';
        $result = $this->apiService->postForByteArrayAsync($url, $solicitud);

        if ($result->IsSuccess) {
            return new Response(200, $result->Data);
        } else {
            return new Response($result->StatusCode, null, $result->Errores);
        }
    }

    public function obtenerTimbreDteAsync($solicitud)
    {
        $url = '/dte/timbre';
        $result = $this->apiService->postForByteArrayAsync($url, $solicitud);

        if ($result->IsSuccess) {
            return new Response(200, $result->Data);
        } else {
            return new Response($result->StatusCode, null, $result->Errores);
        }
    }


    public function obtenerXmlDteAsync($solicitud)
    {
        $url = '/dte/xml';
        $result = $this->apiService->postForByteArrayAsync($url, $solicitud);

        if ($result->IsSuccess) {
            return new Response(200, $result->Data);
        } else {
            return new Response($result->StatusCode, null, $result->Errores);
        }
    }

    public function obtenerDteAsync($solicitud)
    {
        $url = '/documentIssued';
        $result = $this->apiService->postAsync($url, $solicitud);

        if ($result->IsSuccess) {
            // Data ya está decodificado; no usar json_decode
            $decodedData = $result->Data;

            return new Response(200, $decodedData); // Devuelve los datos
        } else {
            return new Response($result->StatusCode, null, $result->Errores);
        }
    }


    public function obtenerSobreXmlDteAsync($solicitud, TipoSobreEnvio $tipoSobre)
    {
        // Usa el valor del enum (int) en la URL
        $url = "/dte/xml/sobre/{$tipoSobre->value}";

        $result = $this->apiService->postForByteArrayAsync($url, $solicitud);

        if ($result->IsSuccess) {
            return new Response(200, $result->Data); // Devuelve los datos binarios
        } else {
            return new Response($result->StatusCode, null, $result->Errores); // Devuelve el error
        }
    }


}
