<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\ListaBHERequest;
use GuzzleHttp\Promise\PromiseInterface;

interface IBoletasHonorarioService
{
    public function ObtenerPDFBHEEmitidaAsync(BHERequest $request): PromiseInterface;
    public function ListadoBHEEmitidasAsync(ListaBHERequest $request): PromiseInterface;
    public function ObtenerPDFBHERecibidosAsync(BHERequest $request): PromiseInterface;
    public function ListadoBHERecibidosAsync(ListaBHERequest $request): PromiseInterface;
}
