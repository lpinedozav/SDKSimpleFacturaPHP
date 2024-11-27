<?php

namespace SDKSimpleFactura\Models\Facturacion;

class SubDescuento
{
    /**
     * Indica en qué está expresado el descuento, en porcentaje (%) o pesos ($) Enum.
     * @var string
     */
    public string $TipoDscto;

    /**
     * Valor de subdescuento.
     * @var float
     */
    public float $ValorDscto;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TipoDscto = 'NotSet'; // Representación inicial de Enum.ExpresionDinero.ExpresionDineroEnum
        $this->ValorDscto = 0.0;
    }
}
