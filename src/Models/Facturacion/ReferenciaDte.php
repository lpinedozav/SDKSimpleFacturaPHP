<?php

namespace SDKSimpleFactura\Models\Response;

use DateTime;
use SDKSimpleFactura\Enum\DTEType;

class ReferenciaDte
{
    public ?string $fecha = null;
    public ?DateTime $FchRef = null;
    public ?string $Motivo = null;
    public ?string $Razon = null;
    public ?string $Glosa = null;
    public ?int $Folio = null;
    public ?DTEType $TipoDoc = null;
}
