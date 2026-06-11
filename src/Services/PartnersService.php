<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IPartnersService;
use SDKSimpleFactura\Models\Request\PartnerDteResumenRequest;
use SDKSimpleFactura\Models\Request\WizardEmisorRequest;
use SDKSimpleFactura\Models\Response\PartnerDteResumenEnt;

class PartnersService implements IPartnersService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function ObtenerResumenDtesAsync(PartnerDteResumenRequest $request): PromiseInterface
    {
        $url = '/partners/dtes/resumen';
        return $this->apiService->PostAsync($url, $request, PartnerDteResumenEnt::class);
    }

    public function EnrolamientoEmpresaAsync(WizardEmisorRequest $request): PromiseInterface
    {
        $url = '/partners/enrolamiento-empresa';
        return $this->apiService->PostAsync($url, $request, 'string');
    }
}
