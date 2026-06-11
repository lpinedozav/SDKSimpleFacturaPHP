<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\AnulacionBoletaHonorario;

/**
 * Request para anular una BHE emitida (/bhe/anular).
 */
class AnularBheRequest
{
    public ?string $RutEmpresa;
    public ?int $Folio;
    public ?AnulacionBoletaHonorario $Motivo;

    public function __construct(
        ?string $RutEmpresa = null,
        ?int $Folio = null,
        ?AnulacionBoletaHonorario $Motivo = null
    ) {
        $this->RutEmpresa = $RutEmpresa;
        $this->Folio = $Folio;
        $this->Motivo = $Motivo;
    }
}
