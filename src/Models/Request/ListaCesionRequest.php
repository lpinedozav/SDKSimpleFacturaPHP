<?php

namespace SDKSimpleFactura\Models\Request;

use DateTime;
use SDKSimpleFactura\Enum\Ambiente;

/**
 * Request para listar cesiones emitidas (/cessions/Issued).
 */
class ListaCesionRequest
{
    public ?Credenciales $Credenciales;
    public ?Ambiente $Ambiente;
    public ?DateTime $Desde;
    public ?DateTime $Hasta;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?Ambiente $Ambiente = null,
        ?DateTime $Desde = null,
        ?DateTime $Hasta = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Ambiente = $Ambiente;
        $this->Desde = $Desde;
        $this->Hasta = $Hasta;
    }
}
