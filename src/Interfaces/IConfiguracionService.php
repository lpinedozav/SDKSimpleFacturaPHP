<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\EmisorApiEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface IConfiguracionService
{
    /**
     * Obtener los datos de la empresa de forma asincrónica.
     *
     * @param Credenciales $credenciales
     * @return PromiseInterface<Response<EmisorApiEnt>|null>
     */
    public function datosEmpresaAsync(Credenciales $credenciales): PromiseInterface;
}
