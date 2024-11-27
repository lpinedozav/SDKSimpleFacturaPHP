<?php

namespace SDKSimpleFactura\Interfaces;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Enum\TipoSobreEnvio;

interface IFacturacionService
{
    public function ObtenerPdfDteAsync($solicitud): PromiseInterface;

    public function ObtenerTimbreDteAsync($solicitud): PromiseInterface;

    public function ObtenerXmlDteAsync($solicitud): PromiseInterface;

    public function ObtenerDteAsync($solicitud): PromiseInterface;

    public function ObtenerSobreXmlDteAsync($solicitud, TipoSobreEnvio $tipoSobre): PromiseInterface;
}
