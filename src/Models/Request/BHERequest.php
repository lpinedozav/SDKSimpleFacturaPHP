<?php

namespace SDKSimpleFactura\Models\Request;

class BHERequest
{
    public ?Credenciales $credenciales;
    public ?int $folio;

    public function __construct(
        ?string $credenciales = null,
        ?string $folio = null,
    ) {
        $this->credenciales = $credenciales;
        $this->folio = $folio;
    }
}
