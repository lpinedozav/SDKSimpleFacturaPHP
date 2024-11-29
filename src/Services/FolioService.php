<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IFolioService;
use SDKSimpleFactura\Models\Request\FolioRequest;
use SDKSimpleFactura\Models\Response\FoliosAnulablesEnt;
use SDKSimpleFactura\Models\Response\TimbrajeApiEnt;
use SDKSimpleFactura\Request\SolicitudFoliosRequest;

class FolioService implements IFolioService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function ConsultaFoliosDisponiblesAsync(SolicitudFoliosRequest $request): PromiseInterface
    {
        $url = "/folios/consultar/disponibles";
        return $this->apiService->PostAsync($url, $request, int::class);
    }
    public function SolicitarFoliosAsync(FolioRequest $request): PromiseInterface
    {
        $url = "/folios/solicitar";
        return $this->apiService->PostAsync($url, $request, TimbrajeApiEnt::class);
    }
    public function ConsultarFoliosAsync(FolioRequest $request): PromiseInterface
    {
        $url = "/folios/consultar";
        return $this->apiService->PostAsync($url, $request, FoliosAnulablesEnt::class);
    }
    public function FoliosSinUsoAsync(SolicitudFoliosRequest $request): PromiseInterface
    {
        $url = "/folios/consultar/sin-uso";
        return $this->apiService->PostAsync($url, $request, FoliosAnulablesEnt::class);
    }
}
