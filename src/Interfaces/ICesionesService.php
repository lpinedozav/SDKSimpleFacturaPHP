<?php

namespace SDKSimpleFactura\Interfaces;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Models\Request\CederFacturaRequest;
use SDKSimpleFactura\Models\Request\ListaCesionRequest;
use SDKSimpleFactura\Models\Request\CessionXmlRequest;
use SDKSimpleFactura\Models\Request\CesionTrazaRequest;
use SDKSimpleFactura\Models\Request\AuthorizedPersonsListRequest;
use SDKSimpleFactura\Models\Request\AddAuthorizedPersonRequest;
use SDKSimpleFactura\Models\Request\CessionariesListRequest;
use SDKSimpleFactura\Models\Request\AddCessionaryRequest;

interface ICesionesService
{
    public function CederFacturaAsync(CederFacturaRequest $request): PromiseInterface;
    public function ListadoCesionesAsync(ListaCesionRequest $request): PromiseInterface;
    public function ObtenerXmlCesionAsync(CessionXmlRequest $request): PromiseInterface;
    public function GetTrazasCesionesAsync(CesionTrazaRequest $request): PromiseInterface;
    public function ListarPersonasAutorizadasAsync(AuthorizedPersonsListRequest $request): PromiseInterface;
    public function AgregarPersonaAutorizadaAsync(AddAuthorizedPersonRequest $request): PromiseInterface;
    public function ListarCesionariosAsync(CessionariesListRequest $request): PromiseInterface;
    public function AgregarCesionarioAsync(AddCessionaryRequest $request): PromiseInterface;
}
