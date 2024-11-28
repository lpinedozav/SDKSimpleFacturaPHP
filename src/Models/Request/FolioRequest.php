<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;

class FolioRequest
{
    /**
     * @var Credenciales
     */
    public Credenciales $credenciales;

    /**
     * @var int
     */
    public int $cantidad;

    /**
     * @var ?DTEType
     */
    public ?DTEType $codigoTipoDte;

    /**
     * @var ?int
     */
    public ?int $ambiente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credenciales = new Credenciales();
        $this->cantidad = 0;
        $this->codigoTipoDte = null;
        $this->ambiente = null;
    }
}
