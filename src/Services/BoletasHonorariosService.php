<?php
// src/Services/BoletasHonorariosService.php
namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IBoletasHonorarioService;
use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\ListaBHERequest;
use SDKSimpleFactura\Models\Response\BHEEnt;
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
}