<?php

namespace SDKSimpleFactura\Models\Facturacion;

class SubTotal
{
    /**
     * Número de sub-total.
     * Número secuencial de acuerdo al número de subtotales.
     * @var int
     */
    public int $NroSTI;

    /**
     * Título del subtotal.
     * @var string
     */
    public string $GlosaSTI;

    /**
     * Ubicación para impresión.
     * De uso para el contribuyente como ayuda para indicar cómo se imprimirá los subtotales.
     * @var int
     */
    public int $OrdenSTI;

    /**
     * Valor neto del subtotal.
     * @var float
     */
    public float $SubTotNetoSTI;

    /**
     * Valor del IVA del subtotal.
     * @var float
     */
    public float $SubTotIVASTI;

    /**
     * Valor de los impuestos adicionales o específicos del subtotal.
     * @var float
     */
    public float $SubTotAdicSTI;

    /**
     * Valor no afecto o exento del subtotal.
     * @var float
     */
    public float $SubTotExeSTI;

    /**
     * Valor de la línea de subtotal.
     * @var float
     */
    public float $ValSubtotSTI;

    /**
     * Tabla de líneas de detalle que se agrupan en el subtotal.
     * @var array
     */
    public ?array $LineasDeta;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->NroSTI = 0;
        $this->GlosaSTI = '';
        $this->OrdenSTI = 0;
        $this->SubTotNetoSTI = 0.0;
        $this->SubTotIVASTI = 0.0;
        $this->SubTotAdicSTI = 0.0;
        $this->SubTotExeSTI = 0.0;
        $this->ValSubtotSTI = 0.0;
        $this->LineasDeta = [];
    }
}
