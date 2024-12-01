<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\SucursalEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface ISucursalService
{
    public function ListadoSucursalesAsync(Credenciales $credenciales): PromiseInterface;
}
