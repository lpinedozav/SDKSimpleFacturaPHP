<?php

namespace SDKSimpleFactura\Models\Facturacion;

class ComisionRecargo
{
    /**
     * Número secuencial de la línea.
     * La obligatoriedad se refiere a que si se incluye esta zona debe haber al menos una línea y este caso debe ir el dato de número de línea.
     * @var int
     */
    public int $NroLinCom;

    /**
     * Tipo de movimiento: C (Comisión) u O (Otros cargos) Enum.
     * @var string
     */
    public string $TipoMovim;

    /**
     * Especificación de la comisión u otro cargo.
     * @var string
     */
    public string $Glosa;

    /**
     * Valor porcentual de la comisión u otro cargo.
     * @var float
     */
    public float $TasaComision;

    /**
     * Valor neto de la comisión u otro cargo.
     * En Notas de Crédito, Notas de Débito y Facturas de Compra.
     * Puede ser cero si el Valor Exento es distinto de cero.
     * En Liquidaciones-Factura puede ser negativo.
     * @var int
     */
    public int $ValComNeto;

    /**
     * Valor no afecto o exento de la comisión u otros cargos.
     * En Notas de Crédito, Notas de Débito y Facturas de Compra.
     * Puede ser cero si el Valor Neto es distinto de cero.
     * En Liquidaciones-Factura puede ser negativo.
     * @var int
     */
    public int $ValComExe;

    /**
     * Valor IVA de la comisión u otros cargos.
     * Valor * Tasa IVA.
     * En Notas de Crédito, Notas de Débito y Facturas de Compra.
     * En Liquidaciones-Factura puede ser negativo.
     * @var int
     */
    public int $ValComIVA;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->NroLinCom = 0;
        $this->TipoMovim = 'NotSet';
        $this->Glosa = '';
        $this->TasaComision = 0.0;
        $this->ValComNeto = 0;
        $this->ValComExe = 0;
        $this->ValComIVA = 0;
    }

    private function truncate(string $value, int $length): string
    {
        return mb_substr($value, 0, $length);
    }

    /**
     * Asignar un valor truncado a TpoCodigo.
     * @param string $value
     */
    public function setGlosa(string $value): void
    {
        $this->Glosa = $this->truncate($value, 60);
    }
    /**
     * Asignar un valor truncado a TpoCodigo.
     * @param string $value
     */
    public function setTasaComision(string $value): void
    {
        $this->TasaComision = $this->truncate($value, 2);
    }
}
