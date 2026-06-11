<?php

namespace SDKSimpleFactura\Interfaces;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Models\Request\PartnerDteResumenRequest;
use SDKSimpleFactura\Models\Request\WizardEmisorRequest;

interface IPartnersService
{
    public function ObtenerResumenDtesAsync(PartnerDteResumenRequest $request): PromiseInterface;
    public function EnrolamientoEmpresaAsync(WizardEmisorRequest $request): PromiseInterface;
}
