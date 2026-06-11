<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\ObservacionBoletaHonorario;

/**
 * Request para observar una BHE recibida (/bhe/observacion).
 */
class BheObservacionRequest
{
    public ?string $RutEmpresa;
    public ?string $rutContribuyente;
    public ?int $Folio;
    public ?ObservacionBoletaHonorario $Observacion;

    public function __construct(
        ?string $RutEmpresa = null,
        ?string $rutContribuyente = null,
        ?int $Folio = null,
        ?ObservacionBoletaHonorario $Observacion = null
    ) {
        $this->RutEmpresa = $RutEmpresa;
        $this->rutContribuyente = $rutContribuyente;
        $this->Folio = $Folio;
        $this->Observacion = $Observacion;
    }
}
