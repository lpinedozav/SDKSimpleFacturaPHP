<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\Moneda;

class OtraMoneda
{
    /**
     * Tipo de moneda (Tabla de monedas de aduana) Enum.
     * @var Moneda
     */
    public Moneda $TpoMoneda;

    /**
     * Tipo de cambio fijado por el Banco Central de Chile.
     * @var float
     */
    private float $TpoCambio = 0;

    /**
     * Monto neto del DTE en otra moneda.
     * @var float
     */
    private float $MntNetoOtrMnda = 0;

    /**
     * Monto exento del DTE en otra moneda.
     * @var float
     */
    private float $MntExeOtrMnda = 0;

    /**
     * Monto base faenamiento carne en otra moneda.
     * @var float
     */
    private float $MntFaeCarneOtrMnda = 0;

    /**
     * Monto base de márgenes de comercialización.
     * @var float
     */
    private float $MntMargComOtrMnda = 0;

    /**
     * Monto del IVA del DTE en otra moneda.
     * @var float
     */
    private float $IVAOtrMnda = 0;

    /** @var ImpuestosRetencionesOtraMoneda[] */
    public ?array $ImpRetOtrMnda = [];

    /**
     * Monto del IVA no retenido en otra moneda.
     * @var float
     */
    private float $IVANoRetOtrMnda = 0;

    /**
     * Monto total del DTE en otra moneda.
     * @var float
     */
    private float $MntTotOtrMnda = 0;
}
