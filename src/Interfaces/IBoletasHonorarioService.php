<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\ListaBHERequest;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\BHEEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface IBoletasHonorarioService
{
    /**
     * Obtener el PDF de una Boleta de Honorarios Emitida de forma asincrónica.
     *
     * @param BHERequest $request
     * @return PromiseInterface<Response<string>>
     */
    public function obtenerPDFBHEEmitidaAsync(BHERequest $request): PromiseInterface;

    /**
     * Listar Boletas de Honorarios Emitidas de forma asincrónica.
     *
     * @param ListaBHERequest $request
     * @return PromiseInterface<Response<BHEEnt[]>|null>
     */
    public function listadoBHEEmitidasAsync(ListaBHERequest $request): PromiseInterface;

    /**
     * Obtener el PDF de una Boleta de Honorarios Recibida de forma asincrónica.
     *
     * @param BHERequest $request
     * @return PromiseInterface<Response<string>>
     */
    public function obtenerPDFBHERecibidosAsync(BHERequest $request): PromiseInterface;

    /**
     * Listar Boletas de Honorarios Recibidas de forma asincrónica.
     *
     * @param ListaBHERequest $request
     * @return PromiseInterface<Response<BHEEnt[]>|null>
     */
    public function listadoBHERecibidosAsync(ListaBHERequest $request): PromiseInterface;
}
