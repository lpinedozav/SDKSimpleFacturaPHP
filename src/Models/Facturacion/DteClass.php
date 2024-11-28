<?php

namespace SDKSimpleFactura\Models\Facturacion;

class DteClass
{
    /**
     * @var int
     */
    public int $folio;

    /**
     * @var int
     */
    public int $tipoDte;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->folio = 0;
        $this->tipoDte = 0;
    }
}
