<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Models\Request\Credenciales;

class ListaBHERequest
{
    public ?Credenciales $credenciales;
    public ?int $folio;
    public ?\DateTime $desde;
    public ?\DateTime $hasta;

    /**
     * Constructor
     */
    public function __construct(
        ?Credenciales $credenciales = null,
        ?int $folio = null,
        ?\DateTime $desde = null,
        ?\DateTime $hasta = null
    ) {
        $this->credenciales = $credenciales;
        $this->folio = $folio;
        $this->desde = $desde;
        $this->hasta = $hasta;
    }
}