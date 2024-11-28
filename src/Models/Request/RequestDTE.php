<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Models\Facturacion\Documento;
use SDKSimpleFactura\Models\Facturacion\Exportaciones;

class RequestDTE
{
    public ?Documento $Documento;
    public ?Exportaciones $Exportaciones;
    public ?string $Cajero;
    public ?int $Propina;
    public ?string $Observaciones;
    public ?string $TipoPago;

    public function __construct(
        ?Documento $Documento = null,
        ?Exportaciones $Exportaciones = null,
        ?string $Cajero = null,
        ?int $Propina = null,
        ?string $Observaciones = null,
        ?string $TipoPago = null
    ) {
        $this->Documento = $Documento;
        $this->Exportaciones = $Exportaciones;
        $this->Observaciones = $Observaciones;
        $this->Cajero = $Cajero;
        $this->TipoPago = $TipoPago;
        $this->Propina = $Propina;
    }
}
