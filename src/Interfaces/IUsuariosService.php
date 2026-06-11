<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\Credenciales;
use GuzzleHttp\Promise\PromiseInterface;

interface IUsuariosService
{
    public function GetUsuariosAsync(Credenciales $credenciales): PromiseInterface;
}
