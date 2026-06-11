<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\TipoRetencion;

/**
 * Request para emitir una Boleta de Honorarios Electrónica
 * (/bhe/emitir y /bhe/terceros/emitir).
 */
class BHEmitirRequest
{
    public ?string $RutEmisor;
    public ?string $Correo;
    public ?TipoRetencion $Retencion;
    public ?string $FechaEmision;
    public ?BheReceptor $Receptor;
    public ?BheEmisor $Emisor;
    /** @var BheDetalle[]|null */
    public ?array $Detalles;
    public ?int $Folio;
    public ?string $Observacion;

    public function __construct(
        ?string $RutEmisor = null,
        ?string $Correo = null,
        ?TipoRetencion $Retencion = null,
        ?string $FechaEmision = null,
        ?BheReceptor $Receptor = null,
        ?BheEmisor $Emisor = null,
        ?array $Detalles = null,
        ?int $Folio = null,
        ?string $Observacion = null
    ) {
        $this->RutEmisor = $RutEmisor;
        $this->Correo = $Correo;
        $this->Retencion = $Retencion;
        $this->FechaEmision = $FechaEmision;
        $this->Receptor = $Receptor;
        $this->Emisor = $Emisor;
        $this->Detalles = $Detalles;
        $this->Folio = $Folio;
        $this->Observacion = $Observacion;
    }
}
