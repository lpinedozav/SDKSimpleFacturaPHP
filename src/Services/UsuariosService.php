<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IUsuariosService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\UsuarioEnt;

class UsuariosService implements IUsuariosService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function GetUsuariosAsync(Credenciales $credenciales): PromiseInterface
    {
        $url = '/empresas/usuarios';
        return $this->apiService->PostAsync($url, $credenciales, UsuarioEnt::class);
    }
}
