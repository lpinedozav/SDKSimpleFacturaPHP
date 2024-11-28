<?php

namespace SDKSimpleFactura\Models\Facturacion;

class ComisionRecargo
{
    /**
     * Número secuencial de la línea.
     * La obligatoriedad se refiere a que si se incluye esta zona debe haber al menos una línea y este caso debe ir el dato de número de línea.
     * @var int
     */
    public ?int $NroLinCom;

    /**
     * Tipo de movimiento: C (Comisión) u O (Otros cargos) Enum.
     * @var string
     */
    public ?string $TipoMovim;

    /**
     * Especificación de la comisión u otro cargo.
     * @var string
     */
    public ?string $Glosa;

    /**
     * Valor porcentual de la comisión u otro cargo.
     * @var float
     */
    public ?float $TasaComision;

    /**
     * Valor neto de la comisión u otro cargo.
     * En Notas de Crédito, Notas de Débito y Facturas de Compra.
     * Puede ser cero si el Valor Exento es distinto de cero.
     * En Liquidaciones-Factura puede ser negativo.
     * @var int
     */
    public ?int $ValComNeto;

    /**
     * Valor no afecto o exento de la comisión u otros cargos.
     * En Notas de Crédito, Notas de Débito y Facturas de Compra.
     * Puede ser cero si el Valor Neto es distinto de cero.
     * En Liquidaciones-Factura puede ser negativo.
     * @var int
     */
    public ?int $ValComExe;

    /**?
     * Valor IVA de la comisión u otros cargos.
     * Valor * Tasa IVA.
     * En Notas de Crédito, Notas de Débito y Facturas de Compra.
     * En Liquidaciones-Factura puede ser negativo.
     * @var int
     */
    public ?int $ValComIVA;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?int $NroLinCom = null,
        ?int $TipoMovim = null,
        ?string $Glosa = null,
        ?float $TasaComision = null,
        ?int $ValComNeto = null,
        ?int $ValComExe = null,
        ?int $ValComIVA = null
    ) {
        $this->NroLinCom = $NroLinCom;
        $this->TipoMovim = $TipoMovim;
        $this->Glosa = $Glosa;
        $this->TasaComision = $TasaComision;
        $this->ValComNeto = $ValComExe;
        $this->ValComExe = $ValComExe;
        $this->ValComIVA = $ValComIVA;
    }

}
