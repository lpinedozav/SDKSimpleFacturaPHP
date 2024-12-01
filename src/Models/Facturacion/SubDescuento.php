<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\ExpresionDinero;

class SubDescuento
{
    /**
     * Indica en qué está expresado el descuento, en porcentaje (%) o pesos ($) Enum.
     * @var ExpresionDinero
     */
    public ?ExpresionDinero $TipoDscto;

    /**
     * Valor de subdescuento.
     * @var float
     */
    public ?float $ValorDscto;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?ExpresionDinero $TipoDscto = null,
        ?float $valorDscto = null
    ) {
        $this->TipoDscto = $TipoDscto;
        $this->valorDscto = $valorDscto;
    }
}
