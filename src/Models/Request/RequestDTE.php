<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Models\Documento;

class RequestDTE
{
    public ?Documento $Documento = null;
    public ?Exportaciones $Exportaciones = null;
    public ?string $Observaciones = null;
    public ?string $Cajero = null;
    public ?string $TipoPago = null;
    public ?int $Propina = null;
}
