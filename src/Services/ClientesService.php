<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IClientesService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Response\ReceptorExternoEnt;

class ClientesService implements IClientesService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function AgregarClientesAsync(DatoExternoRequest $request): PromiseInterface
    {
        $url = "/addClients";
        return $this->apiService->PostAsync($url, $request, ReceptorExternoEnt::class);
    }
    public function ListarClientesAsync(Credenciales $credenciales): PromiseInterface
    {
        $url = "/clients";
        return $this->apiService->PostAsync($url, $credenciales, ReceptorExternoEnt::class);
    }
}
