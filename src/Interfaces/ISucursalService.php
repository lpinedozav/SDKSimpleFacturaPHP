<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\SucursalEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface ISucursalService
{
    /**
     * Obtener el listado de sucursales de forma asincrónica.
     *
     * @param Credenciales $credenciales
     * @return PromiseInterface<Response<SucursalEnt[]>|null>
     */
    public function listadoSucursalesAsync(Credenciales $credenciales): PromiseInterface;
}
