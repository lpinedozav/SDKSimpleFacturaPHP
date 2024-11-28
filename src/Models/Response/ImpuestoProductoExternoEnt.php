<?php

namespace SDKSimpleFactura\Models\Response;

class ImpuestoProductoExternoEnt
{
    /**
     * Código SII del impuesto.
     * @var int
     */
    public ?int $codigoSii;

    /**
     * Nombre del impuesto.
     * @var string
     */
    public ?string $nombreImp;

    /**
     * Tasa del impuesto.
     * @var float
     */
    public ?float $tasa;


    public function __construct(
        ?int $codigoSii = null,
        ?string $nombreImp = null,
        ?float $tasa = null
    ) {
        $this->codigoSii = $codigoSii;
        $this->nombreImp = $nombreImp;
        $this->tasa = $tasa;
    }
}
