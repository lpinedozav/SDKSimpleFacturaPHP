<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\ListaBHERequest;
use SDKSimpleFactura\Models\Request\BHEmitirRequest;
use SDKSimpleFactura\Models\Request\AnularBheRequest;
use SDKSimpleFactura\Models\Request\BheObservacionRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use GuzzleHttp\Promise\PromiseInterface;

interface IBoletasHonorarioService
{
    public function ObtenerPDFBHEEmitidaAsync(BHERequest $request): PromiseInterface;
    public function ListadoBHEEmitidasAsync(ListaBHERequest $request): PromiseInterface;
    public function ObtenerPDFBHERecibidosAsync(BHERequest $request): PromiseInterface;
    public function ListadoBHERecibidosAsync(ListaBHERequest $request): PromiseInterface;
    public function EmitirBheAsync(BHEmitirRequest $request): PromiseInterface;
    public function EmitirBheTercerosAsync(BHEmitirRequest $request): PromiseInterface;
    public function AnularBheAsync(AnularBheRequest $request): PromiseInterface;
    public function ObservarBheAsync(BheObservacionRequest $request): PromiseInterface;
    public function ConciliarBheEmitidasAsync(Credenciales $credenciales, int $mes, int $anio): PromiseInterface;
    public function ConciliarBheRecibidasAsync(Credenciales $credenciales, int $mes, int $anio): PromiseInterface;
}
