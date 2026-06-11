<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;

/**
 * Request para obtener el XML AEC de una cesión (/cessions/xml).
 */
class CessionXmlRequest
{
    public ?Credenciales $Credenciales;
    public ?int $Folio;
    public ?DTEType $CodigoTipoDte;
    public ?Ambiente $Ambiente;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?int $Folio = null,
        ?DTEType $CodigoTipoDte = null,
        ?Ambiente $Ambiente = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Folio = $Folio;
        $this->CodigoTipoDte = $CodigoTipoDte;
        $this->Ambiente = $Ambiente;
    }
}
