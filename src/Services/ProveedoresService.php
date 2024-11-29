<?php
// src/Services/FacturacionService.php
namespace SDKSimpleFactura\Services;

use SDKSimpleFactura\Interfaces\IApiService;
use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IProovedoresService;
use SDKSimpleFactura\Models\Request\AcuseReciboExternoRequest;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Request\Credenciales;



class ProveedoresService implements IProovedoresService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function acuseReciboAsync(AcuseReciboExternoRequest $request): PromiseInterface
    {
        $url = '/acknowledgmentReceipt';
        return $this->apiService->PostAsync($url, $request, "boolean");
    }

    public function listadoDtesRecibidosAsync(ListadoDteRequest $request): PromiseInterface
    {
        $url = '/documentsReceived';
        return $this->apiService->PostAsync($url, $request, 'SDKSimpleFactura\Models\Response\DteEnt');
    }

    public function obtenerXmlAsync(ListadoDteRequest $request): PromiseInterface
    {
        $url = '/documentReceived/xml';
        return $this->apiService->PostForByteArrayAsync($url, $request)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return new Response($result->StatusCode, null, $result->Errores);
                }
            }
        );
    }
    public function obtenerPDFAsync(ListadoDteRequest $request): PromiseInterface
    {
        $url = '/documentReceived/getPdf';
        return $this->apiService->PostForByteArrayAsync($url, $request)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return new Response($result->StatusCode, null, $result->Errores);
                }
            }
        );
    }

    public function conciliarRecibidosAsync(Credenciales $credenciales, int $mes, int $anio): PromiseInterface
    {
        $url = "/documentsReceived/consolidate/{$mes}/{$anio}";
        return $this->apiService->PostAsync($url, $credenciales, responseClass: 'string');
    }


}