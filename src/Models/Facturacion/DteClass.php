<?php

namespace SDKSimpleFactura\Models\Facturacion;


class DteClass
{
    /**
     * @var int
     */
    public ?int $folio;

    /**
     * @var int
     */
    public ?int $tipoDte;

    /**
     * Constructor
     */
    public function __construct(
        ?int $folio = null,
        ?int $tipoDte = null
    ) {
        $this->folio = $folio;
        $this->tipoDte = $tipoDte;
    }
}
