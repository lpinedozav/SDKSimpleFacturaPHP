<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para obtener el resumen de DTEs de un partner
 * (/partners/dtes/resumen).
 */
class PartnerDteResumenRequest
{
    public ?Credenciales $Credenciales;
    public ?int $Anio;
    public ?int $Mes;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?int $Anio = null,
        ?int $Mes = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Anio = $Anio;
        $this->Mes = $Mes;
    }
}
