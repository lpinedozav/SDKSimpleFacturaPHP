<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Enum\Ambiente;

class FolioRequest
{
    /**
     * @var Credenciales
     */
    public Credenciales $credenciales;

    /**
     * @var int
     */
    public ?int $cantidad;

    /**
     * @var ?DTEType
     */
    public ?DTEType $codigoTipoDte;


    /**
     * @var Ambiente
     */
    public ?Ambiente $ambiente;

    /**
     * Constructor
     */
    public function __construct(
        Credenciales $credenciales,
        ?int $cantidad = null,
        ?DTEType $codigoTipoDte = null,
        ?Ambiente $ambiente = null,
        )
        {
            $this->credenciales = $credenciales;
            $this->cantidad = $cantidad;
            $this->ambiente = $ambiente;
            $this->codigoTipoDte = $codigoTipoDte;
        }
}
