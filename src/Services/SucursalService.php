<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\ISucursalService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\SucursalEnt;

class SucursalService implements ISucursalService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function ListadoSucursalesAsync(Credenciales $credenciales): PromiseInterface
    {
        $url = "/branchOffices";
        return $this->apiService->PostAsync($url, $credenciales, SucursalEnt::class);
    }
}
