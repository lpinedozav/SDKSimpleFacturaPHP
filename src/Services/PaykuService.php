<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IPaykuService;
use SDKSimpleFactura\Models\Request\PaykuTransaccionesRequest;
use SDKSimpleFactura\Models\Request\PaykuToggleRequest;
use SDKSimpleFactura\Models\Request\PaykuReenviarLinkRequest;
use SDKSimpleFactura\Models\Response\PaykuTransaccionEnt;

class PaykuService implements IPaykuService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function TransaccionesAsync(PaykuTransaccionesRequest $request): PromiseInterface
    {
        $url = '/payku/transacciones';
        return $this->apiService->PostAsync($url, $request, PaykuTransaccionEnt::class);
    }

    public function ActivarDesactivarAsync(PaykuToggleRequest $request): PromiseInterface
    {
        $url = '/payku/activar-desactivar';
        return $this->apiService->PostAsync($url, $request, 'boolean');
    }

    public function GenerarUrlAsync(PaykuReenviarLinkRequest $request): PromiseInterface
    {
        $url = '/payku/generar-url';
        return $this->apiService->PostAsync($url, $request, 'string');
    }

    public function ReenviarLinkQrAsync(PaykuReenviarLinkRequest $request): PromiseInterface
    {
        $url = '/payku/reenviar-link-Qr';
        return $this->apiService->PostAsync($url, $request, 'boolean');
    }
}
