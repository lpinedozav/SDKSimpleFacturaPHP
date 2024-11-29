<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\Credenciales;
use GuzzleHttp\Promise\PromiseInterface;

interface IConfiguracionService
{
    public function DatosEmpresaAsync(Credenciales $credenciales): PromiseInterface;
}
