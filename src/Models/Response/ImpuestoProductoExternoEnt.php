<?php

namespace SDKSimpleFactura\Models\Request;

class ImpuestoProductoExternoEnt
{
    /**
     * Código SII del impuesto.
     * @var int
     */
    public int $CodigoSii;

    /**
     * Nombre del impuesto.
     * @var string
     */
    public string $NombreImp;

    /**
     * Tasa del impuesto.
     * @var float
     */
    public float $Tasa;

    /**
     * Constructor para inicializar valores predeterminados.
     *
     * @param int $codigoSii
     * @param string $nombreImp
     * @param float $tasa
     */
    public function __construct(int $codigoSii = 0, string $nombreImp = '', float $tasa = 0.0)
    {
        $this->CodigoSii = $codigoSii;
        $this->NombreImp = $nombreImp;
        $this->Tasa = $tasa;
    }
}
