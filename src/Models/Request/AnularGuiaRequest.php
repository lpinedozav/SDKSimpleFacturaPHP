<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\Ambiente;

/**
 * Request para anular una guía de despacho por folio (/dte/anularGuia).
 */
class AnularGuiaRequest
{
    public ?string $RutEmpresa;
    public ?int $Folio;
    public ?Ambiente $Ambiente;

    public function __construct(
        ?string $RutEmpresa = null,
        ?int $Folio = null,
        ?Ambiente $Ambiente = null
    ) {
        $this->RutEmpresa = $RutEmpresa;
        $this->Folio = $Folio;
        $this->Ambiente = $Ambiente;
    }
}
