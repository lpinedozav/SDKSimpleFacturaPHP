<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\AcuseReciboExternoRequest;
use SDKSimpleFactura\Models\Request\ListaDteRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\DteEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface IProovedoresService
{
    /**
     * Enviar acuse de recibo de forma asincrónica.
     *
     * @param AcuseReciboExternoRequest $request
     * @return PromiseInterface<Response<bool>|null>
     */
    public function acuseReciboAsync(AcuseReciboExternoRequest $request): PromiseInterface;

    /**
     * Listar DTEs recibidos de forma asincrónica.
     *
     * @param ListaDteRequest $request
     * @return PromiseInterface<Response<DteEnt[]>|null>
     */
    public function listadoDtesRecibidosAsync(ListaDteRequest $request): PromiseInterface;

    /**
     * Obtener XML de DTEs recibidos de forma asincrónica.
     *
     * @param ListaDteRequest $request
     * @return PromiseInterface<Response<string>|null>
     */
    public function obtenerXmlAsync(ListaDteRequest $request): PromiseInterface;

    /**
     * Obtener PDF de DTEs recibidos de forma asincrónica.
     *
     * @param ListaDteRequest $request
     * @return PromiseInterface<Response<string>>
     */
    public function obtenerPDFAsync(ListaDteRequest $request): PromiseInterface;

    /**
     * Conciliar DTEs recibidos de forma asincrónica.
     *
     * @param Credenciales $credenciales
     * @param int $mes
     * @param int $anio
     * @return PromiseInterface<Response<string>|null>
     */
    public function conciliarRecibidosAsync(Credenciales $credenciales, int $mes, int $anio): PromiseInterface;
}
