<?php

namespace SDKSimpleFactura\Models;

use SDKSimpleFactura\Models\Facturacion\Documento;
use SDKSimpleFactura\Models\Facturacion\Exportaciones;

class RequestDTE
{
    public ?Documento $Documento = null;
    public ?Exportaciones $Exportaciones = null;
    public ?string $Observaciones = null;
    public ?string $Cajero = null;
    public ?string $TipoPago = null;
    public ?int $Propina = null;
}
