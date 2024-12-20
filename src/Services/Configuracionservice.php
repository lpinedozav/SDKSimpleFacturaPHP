<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IConfiguracionService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\EmisorApiEnt;

class ConfiguracionService implements IConfiguracionService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function DatosEmpresaAsync(Credenciales $credenciales): PromiseInterface
    {
        $url = '/datosEmpresa';
        return $this->apiService->PostAsync($url, $credenciales, EmisorApiEnt::class);
    }
}
