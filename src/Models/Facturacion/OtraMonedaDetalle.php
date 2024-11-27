<?php

namespace SDKSimpleFactura\Models\Facturacion;

class OtraMonedaDetalle
{
    /**
     * Precio unitario en otra moneda.
     * Obligatorio en Guías de Despacho con Indicador de tipo de Traslado de Bienes = 9.
     * @var float
     */
    public float $PrcOtrMon;

    /**
     * Código de otra moneda.
     * (Usar códigos de otra moneda del banco central).
     * @var string
     */
    public string $Moneda;

    /**
     * Factor para conversión a pesos.
     * En documentos de Exportación corresponde al tipo de cambio de la fecha de emisión del documento, publicado por el Banco Central de Chile.
     * @var float
     */
    public float $FctConv;

    /**
     * Descuento en otra moneda.
     * Dinero correspondiente al Descuento en %. Totaliza todos los descuentos otorgados al ítem en otra moneda.
     * @var float
     */
    public float $DctoOtrMnda;

    /**
     * Recargo en otra moneda.
     * Dinero correspondiente al Recargo en %. Totaliza todos los recargos otorgados al ítem en otra moneda.
     * @var float
     */
    public float $RecargoOtrMnda;

    /**
     * Valor por línea de detalle en otra moneda.
     * (Precio Unitario en otra moneda * Cantidad ) – Descuento en otra moneda + Recargo en otra moneda.
     * Obligatorio en Guías de Despacho con Indicador de tipo de Traslado de Bienes = 9.
     * @var float
     */
    public float $MontoItemOtrMnda;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->PrcOtrMon = 0.0;
        $this->Moneda = '';
        $this->FctConv = 0.0;
        $this->DctoOtrMnda = 0.0;
        $this->RecargoOtrMnda = 0.0;
        $this->MontoItemOtrMnda = 0.0;
    }
}
