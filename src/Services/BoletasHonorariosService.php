<?php
// src/Services/BoletasHonorariosService.php
namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IBoletasHonorarioService;
use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\ListaBHERequest;
use SDKSimpleFactura\Models\Request\BHEmitirRequest;
use SDKSimpleFactura\Models\Request\AnularBheRequest;
use SDKSimpleFactura\Models\Request\BheObservacionRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\BHEEnt;
use SDKSimpleFactura\Models\Response\BheEmitidaEnt;
use SDKSimpleFactura\Models\Response\Response;

class BoletasHonorariosService implements IBoletasHonorarioService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function ObtenerPDFBHEEmitidaAsync(BHERequest $request): PromiseInterface
    {
        $url = '/bhe/pdfIssuied';
        return $this->apiService->PostForByteArrayAsync($url, $request)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return $result;
                }
            }
        );
    }
    public function ListadoBHEEmitidasAsync(ListaBHERequest $request): PromiseInterface
    {
        $url = '/bhesIssued';
        return $this->apiService->PostAsync($url, $request, BHEEnt::class);
    }
    public function ObtenerPDFBHERecibidosAsync(BHERequest $request): PromiseInterface
    {
        $url = '/bhe/pdfReceived';
        return $this->apiService->PostForByteArrayAsync($url, $request)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return $result;
                }
            }
        );
    }
    public function ListadoBHERecibidosAsync(ListaBHERequest $request): PromiseInterface
    {
        $url = '/bhesReceived';
        return $this->apiService->PostAsync($url, $request, BHEEnt::class);
    }
    public function EmitirBheAsync(BHEmitirRequest $request): PromiseInterface
    {
        $url = '/bhe/emitir';
        return $this->apiService->PostAsync($url, $request, BheEmitidaEnt::class);
    }
    public function EmitirBheTercerosAsync(BHEmitirRequest $request): PromiseInterface
    {
        $url = '/bhe/terceros/emitir';
        return $this->apiService->PostAsync($url, $request, BheEmitidaEnt::class);
    }
    public function AnularBheAsync(AnularBheRequest $request): PromiseInterface
    {
        $url = '/bhe/anular';
        return $this->apiService->PostAsync($url, $request, 'string');
    }
    public function ObservarBheAsync(BheObservacionRequest $request): PromiseInterface
    {
        $url = '/bhe/observacion';
        return $this->apiService->PostAsync($url, $request, 'string');
    }
    public function ConciliarBheEmitidasAsync(Credenciales $credenciales, int $mes, int $anio): PromiseInterface
    {
        $url = "/bhesIssued/consolidate/{$mes}/{$anio}";
        return $this->apiService->PostAsync($url, $credenciales, 'string');
    }
    public function ConciliarBheRecibidasAsync(Credenciales $credenciales, int $mes, int $anio): PromiseInterface
    {
        $url = "/bhesReceived/consolidate/{$mes}/{$anio}";
        return $this->apiService->PostAsync($url, $credenciales, 'string');
    }
}