<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IClientesService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\EditarClienteRequest;
use SDKSimpleFactura\Models\Response\ReceptorExternoEnt;
use SDKSimpleFactura\Models\Response\ReceptorEnt;
use SDKSimpleFactura\Models\Response\ContribuyenteSiiEnt;

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
    public function ClienteXRutAsync(Credenciales $credenciales, string $rut): PromiseInterface
    {
        $url = "/clients/{$rut}";
        return $this->apiService->PostAsync($url, $credenciales, ReceptorEnt::class);
    }
    public function EditarClientesAsync(EditarClienteRequest $request): PromiseInterface
    {
        $url = "/editClients";
        return $this->apiService->PostAsync($url, $request, ReceptorExternoEnt::class);
    }
    public function ObtenerContribuyenteSiiAsync(Credenciales $credenciales, string $rut): PromiseInterface
    {
        $url = "/contribuyentes/correo-intercambio/{$rut}";
        return $this->apiService->PostAsync($url, $credenciales, ContribuyenteSiiEnt::class);
    }
}
