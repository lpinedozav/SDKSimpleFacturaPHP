<?php

namespace SDKSimpleFactura\Models\Request;

use DateTime;

/**
 * Request para listar transacciones Payku (/payku/transacciones).
 */
class PaykuTransaccionesRequest
{
    public ?Credenciales $Credenciales;
    public ?DateTime $Desde;
    public ?DateTime $Hasta;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?DateTime $Desde = null,
        ?DateTime $Hasta = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Desde = $Desde;
        $this->Hasta = $Hasta;
    }
}
