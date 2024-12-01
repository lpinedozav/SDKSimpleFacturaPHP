<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use GuzzleHttp\Promise\PromiseInterface;

interface IProductosService
{
    public function agregarProductosAsync(DatoExternoRequest $request): PromiseInterface;
    public function listarProductosAsync(Credenciales $credenciales): PromiseInterface;
}
