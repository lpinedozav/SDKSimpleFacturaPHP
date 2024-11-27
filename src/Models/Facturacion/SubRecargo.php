<?php

namespace SDKSimpleFactura\Models\Facturacion;

class SubRecargo
{
    /**
     * Tipo de subrecargo Enum.
     * @var string
     */
    public string $TipoRecargo;

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
        $this->TipoRecargo = 'NotSet'; // Representación inicial de Enum.ExpresionDinero.ExpresionDineroEnum
        $this->ValorRecargo = 0.0;
    }
}
