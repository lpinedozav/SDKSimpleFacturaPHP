<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;

class DteReferenciadoExterno
{
    public ?int $folio;
    public ?DTEType $codigoTipoDte;
    public ?Ambiente $ambiente;
    public function __construct(
        ?int $folio = null,
        ?DTEType $codigoTipoDte = null,
        ?Ambiente $ambiente = null
    ) {
        $this->folio = $folio;
        $this->codigoTipoDte = $codigoTipoDte;
        $this->ambiente = $ambiente;
    }
}
