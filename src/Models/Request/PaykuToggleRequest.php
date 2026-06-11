<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para activar o desactivar Payku (/payku/activar-desactivar).
 */
class PaykuToggleRequest
{
    public ?Credenciales $Credenciales;
    public ?bool $Activo;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?bool $Activo = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Activo = $Activo;
    }
}
