<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\ProductoEnt;
use SDKSimpleFactura\Models\Response\ProductoExternoEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface IProductosService
{
    /**
     * Agrega productos de forma asincrónica.
     *
     * @param DatoExternoRequest $request
     * @return PromiseInterface<Response<ProductoEnt[]>|null>
     */
    public function agregarProductosAsync(DatoExternoRequest $request): PromiseInterface;

    /**
     * Lista productos de forma asincrónica.
     *
     * @param Credenciales $credenciales
     * @return PromiseInterface<Response<ProductoExternoEnt[]>|null>
     */
    public function listarProductosAsync(Credenciales $credenciales): PromiseInterface;
}
