<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para generar URL o reenviar link de pago Payku
 * (/payku/generar-url y /payku/reenviar-link-Qr).
 */
class PaykuReenviarLinkRequest
{
    public ?Credenciales $Credenciales;
    public ?DteReferenciadoExterno $Dte;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?DteReferenciadoExterno $Dte = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Dte = $Dte;
    }
}
