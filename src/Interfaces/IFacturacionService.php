<?php

namespace SDKSimpleFactura\Interfaces;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Enum\TipoSobreEnvio;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\Models\Request\SolicitudDte;

interface IFacturacionService
{
    public function ObtenerPdfDteAsync(SolicitudDte $solicitud): PromiseInterface;

    public function ObtenerTimbreDteAsync(SolicitudDte $solicitud): PromiseInterface;

    public function ObtenerXmlDteAsync(SolicitudDte $solicitud): PromiseInterface;

    public function ObtenerDteAsync(SolicitudDte $solicitud): PromiseInterface;

    public function ObtenerSobreXmlDteAsync(SolicitudDte $solicitud, TipoSobreEnvio $tipoSobre): PromiseInterface;
    public function FacturacionIndividualV2DTEAsync(string $sucursal, RequestDTE $solicitud): PromiseInterface;
}
