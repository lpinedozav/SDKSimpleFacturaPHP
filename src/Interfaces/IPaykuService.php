<?php

namespace SDKSimpleFactura\Interfaces;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Models\Request\PaykuTransaccionesRequest;
use SDKSimpleFactura\Models\Request\PaykuToggleRequest;
use SDKSimpleFactura\Models\Request\PaykuReenviarLinkRequest;

interface IPaykuService
{
    public function TransaccionesAsync(PaykuTransaccionesRequest $request): PromiseInterface;
    public function ActivarDesactivarAsync(PaykuToggleRequest $request): PromiseInterface;
    public function GenerarUrlAsync(PaykuReenviarLinkRequest $request): PromiseInterface;
    public function ReenviarLinkQrAsync(PaykuReenviarLinkRequest $request): PromiseInterface;
}
