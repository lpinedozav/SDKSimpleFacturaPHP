<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\AcuseReciboExternoRequest;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\ListaProveedorRequest;

interface IProovedoresService
{
    public function acuseReciboAsync(AcuseReciboExternoRequest $request): PromiseInterface;


    public function listadoDtesRecibidosAsync(ListadoDteRequest $request): PromiseInterface;

    public function obtenerXmlAsync(ListadoDteRequest $request): PromiseInterface;

    public function obtenerPDFAsync(ListadoDteRequest $request): PromiseInterface;
    public function conciliarRecibidosAsync(Credenciales $credenciales, int $mes, int $anio): PromiseInterface;
    public function GetTrazasRecibidosAsync(SolicitudDte $request) : PromiseInterface;
    public function ActualizarListaProveedorAsync(ListaProveedorRequest $request): PromiseInterface;
}
