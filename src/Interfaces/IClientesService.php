<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\ReceptorExternoEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface IClientesService
{
    /**
     * Agregar clientes de forma asincrónica.
     *
     * @param DatoExternoRequest $request
     * @return PromiseInterface<Response<ReceptorExternoEnt[]>|null>
     */
    public function agregarClientesAsync(DatoExternoRequest $request): PromiseInterface;

    /**
     * Listar clientes de forma asincrónica.
     *
     * @param Credenciales $credenciales
     * @return PromiseInterface<Response<ReceptorExternoEnt[]>|null>
     */
    public function listarClientesAsync(Credenciales $credenciales): PromiseInterface;
}
