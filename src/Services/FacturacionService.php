<?php
// src/Services/FacturacionService.php
namespace SDKSimpleFactura\Services;

use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\DteEnt;
use SDKSimpleFactura\Enum\TipoSobreEnvio;
use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Enum\ReasonType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\Models\Request\EnvioMailRequest;

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

    public function facturacionMasiva(Credenciales $credenciales, string $filePath): PromiseInterface
    {
        $url = "/massiveInvoice";
        $multipart = [
            [
                'name' => 'data', // Clave como aparece en Postman
                'contents' => json_encode($credenciales)
            ],
            [
                'name' => 'input', // Clave como aparece en Postman
                'contents' => fopen($filePath, 'r'),
                'filename' => basename($filePath)
            ]
        ];

        return  $this->apiService->PostAsyncMultipart($url, $multipart);
    }

    public function EmisionNC_NDV2Async(string $sucursal, ReasonType $motivo, RequestDTE $solicitud): PromiseInterface
    {
        $url = "/invoiceCreditDebitNotesV2/{$sucursal}/{$motivo->value}";
        return $this->apiService->PostAsync($url, $solicitud, 'SDKSimpleFactura\Models\Response\InvoiceData');
    }

    public function ListadoDtesEmitidosAsync(ListadoDteRequest $request): PromiseInterface
    {
        $url = "/documentsIssued";
        return $this->apiService->PostAsync($url, $request, 'SDKSimpleFactura\Models\Response\DteEnt');
    }
    public function EnvioMailAsync(EnvioMailRequest $request): PromiseInterface
    {
        $url = "/dte/enviar/mail";
        return $this->apiService->PostAsync($url, $request, '');
    }

}
