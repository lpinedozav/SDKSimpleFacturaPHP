<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\ExpresionDinero;

class SubRecargo
{
    /**
     * Tipo de subrecargo Enum.
     * @var ExpresionDinero
     */
    public ?ExpresionDinero $TipoRecargo;

    /**
     * Valor de subrecargo.
     * @var float
     */
    public ?float $ValorRecargo;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?ExpresionDinero $TipoRecargo = null,
        ?float $ValorRecargo = null
    ) {
        $this->TipoRecargo = $TipoRecargo;
        $this->ValorRecargo = $ValorRecargo;
    }
}
