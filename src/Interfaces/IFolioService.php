<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\SolicitudFoliosRequest;
use SDKSimpleFactura\Models\Request\FolioRequest;
use GuzzleHttp\Promise\PromiseInterface;

interface IFolioService
{
    public function ConsultaFoliosDisponiblesAsync(SolicitudFoliosRequest $request): PromiseInterface;
    public function SolicitarFoliosAsync(FolioRequest $request): PromiseInterface;
    public function ConsultarFoliosAsync(FolioRequest $request): PromiseInterface;
    public function FoliosSinUsoAsync(SolicitudFoliosRequest $request): PromiseInterface;
}
