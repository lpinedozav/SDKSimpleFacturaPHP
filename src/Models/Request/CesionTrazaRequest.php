<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\Ambiente;

/**
 * Request para obtener trazas de una cesión emitida
 * (/cessions/trazasIssued).
 */
class CesionTrazaRequest
{
    public ?Credenciales $Credenciales;
    public ?int $Folio;
    public ?Ambiente $Ambiente;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?int $Folio = null,
        ?Ambiente $Ambiente = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Folio = $Folio;
        $this->Ambiente = $Ambiente;
    }
}
