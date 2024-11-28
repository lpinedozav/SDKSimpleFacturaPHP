<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Comisiones
{
    /**
     * Valor neto comisiones y otros cargos.
     * Suma de detalle de Valores de Comisiones y Otros Cargos.
     * @var int
     */
    public int $ValComNeto;

    /**
     * Valor comisión y otros cargos no afectos o exentos.
     * Suma de detalles de valores de comisiones y otros cargos no afectos o exentos.
     * @var int
     */
    public int $ValComExe;

    /**
     * Valor IVA comisiones y otros cargos.
     * Suma de detalle de IVA de Valor de Comisiones y Otros Cargos.
     * @var int
     */
    public int $ValComIVA;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->ValComNeto = 0;
        $this->ValComExe = 0;
        $this->ValComIVA = 0;
    }
}