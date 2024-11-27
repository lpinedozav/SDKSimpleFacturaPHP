<?php

namespace SDKSimpleFactura\Models\Facturacion;

class SubCantidad
{
    /**
     * Cantidad distribuida.
     * @var float
     */
    public float $SubQty;

    /**
     * Código descriptivo de la subcantidad.
     * @var string
     */
    public string $SubCod;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->SubQty = 0.0;
        $this->SubCod = '';
    }
}
