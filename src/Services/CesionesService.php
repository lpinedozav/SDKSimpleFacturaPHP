<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\ICesionesService;
use SDKSimpleFactura\Models\Request\CederFacturaRequest;
use SDKSimpleFactura\Models\Request\ListaCesionRequest;
use SDKSimpleFactura\Models\Request\CessionXmlRequest;
use SDKSimpleFactura\Models\Request\CesionTrazaRequest;
use SDKSimpleFactura\Models\Request\AuthorizedPersonsListRequest;
use SDKSimpleFactura\Models\Request\AddAuthorizedPersonRequest;
use SDKSimpleFactura\Models\Request\CessionariesListRequest;
use SDKSimpleFactura\Models\Request\AddCessionaryRequest;
use SDKSimpleFactura\Models\Response\Response;
use SDKSimpleFactura\Models\Response\CesionEnt;
use SDKSimpleFactura\Models\Response\AuthorizedPersonEnt;
use SDKSimpleFactura\Models\Response\CessionaryEnt;
use SDKSimpleFactura\Models\Response\TrazasEnt;

class CesionesService implements ICesionesService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function CederFacturaAsync(CederFacturaRequest $request): PromiseInterface
    {
        $url = '/cederFactura';
        return $this->apiService->PostAsync($url, $request, 'string');
    }

    public function ListadoCesionesAsync(ListaCesionRequest $request): PromiseInterface
    {
        $url = '/cessions/Issued';
        return $this->apiService->PostAsync($url, $request, CesionEnt::class);
    }

    public function ObtenerXmlCesionAsync(CessionXmlRequest $request): PromiseInterface
    {
        $url = '/cessions/xml';
        return $this->apiService->PostForByteArrayAsync($url, $request)->then(
            function ($result) {
                if ($result->IsSuccess) {
                    return new Response(200, $result->Data);
                } else {
                    return $result;
                }
            }
        );
    }

    public function GetTrazasCesionesAsync(CesionTrazaRequest $request): PromiseInterface
    {
        $url = '/cessions/trazasIssued';
        return $this->apiService->PostAsync($url, $request, TrazasEnt::class);
    }

    public function ListarPersonasAutorizadasAsync(AuthorizedPersonsListRequest $request): PromiseInterface
    {
        $url = '/cessions/personasAutorizadas';
        return $this->apiService->PostAsync($url, $request, AuthorizedPersonEnt::class);
    }

    public function AgregarPersonaAutorizadaAsync(AddAuthorizedPersonRequest $request): PromiseInterface
    {
        $url = '/cessions/personasAutorizadas/agregar';
        return $this->apiService->PostAsync($url, $request, AuthorizedPersonEnt::class);
    }

    public function ListarCesionariosAsync(CessionariesListRequest $request): PromiseInterface
    {
        $url = '/cessions/cesionarios';
        return $this->apiService->PostAsync($url, $request, CessionaryEnt::class);
    }

    public function AgregarCesionarioAsync(AddCessionaryRequest $request): PromiseInterface
    {
        $url = '/cessions/cesionarios/agregar';
        return $this->apiService->PostAsync($url, $request, CessionaryEnt::class);
    }
}
