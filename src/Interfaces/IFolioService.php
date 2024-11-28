<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Request\SolicitudFoliosRequest;// Ensure this class exists in the specified namespace
use SDKSimpleFactura\Models\Request\FolioRequest;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\TimbrajeApiEnt;
use SDKSimpleFactura\Models\Response\FoliosAnulablesEnt;
use GuzzleHttp\Promise\PromiseInterface;

interface IFolioService
{
    /**
     * Consultar la cantidad de folios disponibles de forma asincrónica.
     *
     * @param SolicitudFoliosRequest $request
     * @return PromiseInterface<Response<int>|null>
     */
    public function consultaFoliosDisponiblesAsync(SolicitudFoliosRequest $request): PromiseInterface;

    /**
     * Solicitar nuevos folios de forma asincrónica.
     *
     * @param FolioRequest $request
     * @return PromiseInterface<Response<TimbrajeApiEnt>|null>
     */
    public function solicitarFoliosAsync(FolioRequest $request): PromiseInterface;

    /**
     * Consultar folios existentes de forma asincrónica.
     *
     * @param FolioRequest $request
     * @return PromiseInterface<Response<TimbrajeApiEnt[]>|null>
     */
    public function consultarFoliosAsync(FolioRequest $request): PromiseInterface;

    /**
     * Obtener folios sin uso de forma asincrónica.
     *
     * @param SolicitudFoliosRequest $request
     * @return PromiseInterface<Response<FoliosAnulablesEnt[]>|null>
     */
    public function foliosSinUsoAsync(SolicitudFoliosRequest $request): PromiseInterface;
}
