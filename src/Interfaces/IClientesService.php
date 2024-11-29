<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use GuzzleHttp\Promise\PromiseInterface;

interface IClientesService
{
    public function AgregarClientesAsync(DatoExternoRequest $request): PromiseInterface;
    public function ListarClientesAsync(Credenciales $credenciales): PromiseInterface;
}
