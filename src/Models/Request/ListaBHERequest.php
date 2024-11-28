<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Models\Request\Credenciales;

class ListaBHERequest
{
    /**
     * @var Credenciales
     */
    public Credenciales $credenciales;

    /**
     * @var ?int
     */
    public ?int $folio;

    /**
     * @var ?\DateTime
     */
    public ?\DateTime $desde;

    /**
     * @var ?\DateTime
     */
    public ?\DateTime $hasta;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credenciales = new Credenciales();
        $this->folio = null;
        $this->desde = null;
        $this->hasta = null;
    }
}
