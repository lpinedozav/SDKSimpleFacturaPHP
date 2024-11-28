<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\ExpresionDinero;

class SubRecargo
{
    /**
     * Tipo de subrecargo Enum.
     * @var ExpresionDinero
     */
    public ExpresionDinero $TipoRecargo;

    /**
     * Valor de subrecargo.
     * @var float
     */
    public float $ValorRecargo;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TipoRecargo = ExpresionDinero::NotSet; // Representación inicial de Enum.ExpresionDinero.ExpresionDineroEnum
        $this->ValorRecargo = 0.0;
    }
}
