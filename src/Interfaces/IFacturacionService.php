<?php

namespace SDKSimpleFactura\Interfaces;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Enum\ReasonType;
use SDKSimpleFactura\Enum\TipoSobreEnvio;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\Models\Request\EnvioMailRequest;

interface IFacturacionService
{
    public function ObtenerPdfDteAsync(SolicitudDte $solicitud): PromiseInterface;
    public function ObtenerTimbreDteAsync(SolicitudDte $solicitud): PromiseInterface;
    public function ObtenerXmlDteAsync(SolicitudDte $solicitud): PromiseInterface;
    public function ObtenerDteAsync(SolicitudDte $solicitud): PromiseInterface;
    public function ObtenerSobreXmlDteAsync(SolicitudDte $solicitud, TipoSobreEnvio $tipoSobre): PromiseInterface;
    public function FacturacionIndividualV2DTEAsync(string $sucursal, RequestDTE $solicitud): PromiseInterface;
    public function FacturacionIndividualV2ExportacionAsync(string $sucursal, RequestDTE $solicitud): PromiseInterface;

    public function facturacionMasiva(Credenciales $credenciales, string $filePath): PromiseInterface;

    public function EmisionNC_NDV2Async(string $sucursal, ReasonType $motivo, RequestDTE $solicitud): PromiseInterface;
    public function ListadoDtesEmitidosAsync(ListadoDteRequest $request): PromiseInterface;

    public function EnvioMailAsync(EnvioMailRequest $request): PromiseInterface;

}
