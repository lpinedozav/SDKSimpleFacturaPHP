<?php
// src/Services/FacturacionService.php
namespace SDKSimpleFactura\Services;

use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Models\Response\Response;
use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IProductosService;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;



class ProductosService implements IProductosService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function agregarProductosAsync(DatoExternoRequest $request): PromiseInterface
    {
        $url = '/productos/agregar';
        return $this->apiService->PostAsync($url, $request, 'SDKSimpleFactura\Models\Response\ProductoEnt');
            
    }

    public function listarProductosAsync(Credenciales $credenciales): PromiseInterface
    {
        $url = '/productos/listar';
        return $this->apiService->PostAsync($url, $credenciales,'SDKSimpleFactura\Models\Response\ProductoExternoEnt');
    }
}