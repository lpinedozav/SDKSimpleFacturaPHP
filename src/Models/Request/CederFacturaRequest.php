<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para ceder una factura (/cederFactura).
 */
class CederFacturaRequest
{
    public ?string $CorreoDeudor;
    public ?string $RutCesionario;
    public ?string $RutPersonaAutorizada;
    public ?string $OtrasCondiciones;
    public ?int $Folio;
    public ?string $RutEmpresa;

    public function __construct(
        ?string $CorreoDeudor = null,
        ?string $RutCesionario = null,
        ?string $RutPersonaAutorizada = null,
        ?string $OtrasCondiciones = null,
        ?int $Folio = null,
        ?string $RutEmpresa = null
    ) {
        $this->CorreoDeudor = $CorreoDeudor;
        $this->RutCesionario = $RutCesionario;
        $this->RutPersonaAutorizada = $RutPersonaAutorizada;
        $this->OtrasCondiciones = $OtrasCondiciones;
        $this->Folio = $Folio;
        $this->RutEmpresa = $RutEmpresa;
    }
}
