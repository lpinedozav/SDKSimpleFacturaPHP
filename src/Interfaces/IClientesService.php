<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\EditarClienteRequest;
use GuzzleHttp\Promise\PromiseInterface;

interface IClientesService
{
    public function AgregarClientesAsync(DatoExternoRequest $request): PromiseInterface;
    public function ListarClientesAsync(Credenciales $credenciales): PromiseInterface;
    public function ClienteXRutAsync(Credenciales $credenciales, string $rut): PromiseInterface;
    public function EditarClientesAsync(EditarClienteRequest $request): PromiseInterface;
    public function ObtenerContribuyenteSiiAsync(Credenciales $credenciales, string $rut): PromiseInterface;
}
