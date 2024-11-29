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
    public function __construct(
        Credenciales $credenciales,
        int $cantidad,
        ?DTEType $codigoTipoDte = null,
        ?int $ambiente = null
        )
        {
            $this->credenciales = $credenciales;
            $this->cantidad = $cantidad;
            $this->ambiente = $ambiente;
            $this->codigoTipoDte = $codigoTipoDte;
        }
}
