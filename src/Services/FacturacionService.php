<?php
// src/Services/FacturacionService.php
namespace SDKSimpleFactura\Services;

use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Enum\TipoSobreEnvio;
use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\Models\Request\SolicitudDte;

class FacturacionService implements IFacturacionService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function ObtenerPdfDteAsync($solicitud): PromiseInterface
    {
        $url = '/dte/pdf';
        return $this->apiService->PostForByteArrayAsync($url, $solicitud)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return new Response($result->StatusCode, null, $result->Errores);
                }
            }
        );
    }

    public function ObtenerTimbreDteAsync($solicitud): PromiseInterface
    {
        $url = '/dte/timbre';
        return $this->apiService->PostForByteArrayAsync($url, $solicitud)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return new Response($result->StatusCode, null, $result->Errores);
                }
            }
        );
    }

    public function ObtenerXmlDteAsync($solicitud): PromiseInterface
    {
        $url = '/dte/xml';
        return $this->apiService->PostForByteArrayAsync($url, $solicitud)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return new Response($result->StatusCode, null, $result->Errores);
                }
            }
        );
    }

    public function ObtenerDteAsync($solicitud): PromiseInterface
    {
        $url = '/documentIssued';
        return $this->apiService->PostAsync($url, $solicitud, 'SDKSimpleFactura\Models\Response\DteEnt');
    }

    public function ObtenerSobreXmlDteAsync(SolicitudDte $solicitud, TipoSobreEnvio $tipoSobre): PromiseInterface
    {
        $url = "/dte/xml/sobre/{$tipoSobre->value}";
        return $this->apiService->PostForByteArrayAsync($url, $solicitud)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return new Response($result->StatusCode, null, $result->Errores);
                }
            }
        );
    }
    public function FacturacionIndividualV2DTEAsync(string $sucursal, RequestDTE $solicitud): PromiseInterface
    {
        $url = "/invoiceV2/{$sucursal}";
        return $this->apiService->PostAsync($url, $solicitud, 'SDKSimpleFactura\Models\Response\InvoiceData');
    }
    public function FacturacionIndividualV2ExportacionAsync(string $sucursal, RequestDTE $solicitud): PromiseInterface
    {
        $url = "/dte/exportacion/{$sucursal}";
        return $this->apiService->PostAsync($url, $solicitud, 'SDKSimpleFactura\Models\Response\InvoiceData');
    }
}
