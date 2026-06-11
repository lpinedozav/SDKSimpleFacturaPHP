<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Respuesta de la emisión de una BHE (/bhe/emitir y /bhe/terceros/emitir).
 */
class BheEmitidaEnt
{
    public ?int $folio;
    public ?string $codigoBarras;
    public ?string $fechaEmision;
    public ?string $pdfBase64;

    public function __construct(
        ?int $folio = null,
        ?string $codigoBarras = null,
        ?string $fechaEmision = null,
        ?string $pdfBase64 = null
    ) {
        $this->folio = $folio;
        $this->codigoBarras = $codigoBarras;
        $this->fechaEmision = $fechaEmision;
        $this->pdfBase64 = $pdfBase64;
    }
}
