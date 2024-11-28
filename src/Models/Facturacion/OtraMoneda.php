<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\Moneda;

class OtraMoneda
{
    /**
     * Tipo de moneda (Tabla de monedas de aduana) Enum.
     * @var Moneda
     */
    public ?Moneda $TpoMoneda;

    /**
     * Tipo de cambio fijado por el Banco Central de Chile.
     * @var float
     */
    public ?float $TpoCambio = 0;

    /**
     * Monto neto del DTE en otra moneda.
     * @var float
     */
    public ?float $MntNetoOtrMnda = 0;

    /**
     * Monto exento del DTE en otra moneda.
     * @var float
     */
    public ?float $MntExeOtrMnda = 0;

    /**
     * Monto base faenamiento carne en otra moneda.
     * @var float
     */
    public ?float $MntFaeCarneOtrMnda = 0;

    /**
     * Monto base de márgenes de comercialización.
     * @var float
     */
    public ?float $MntMargComOtrMnda = 0;

    /**
     * Monto del IVA del DTE en otra moneda.
     * @var float
     */
    public ?float $IVAOtrMnda = 0;

    /** @var ImpuestosRetencionesOtraMoneda[] */
    public ?array $ImpRetOtrMnda = [];

    /**
     * Monto del IVA no retenido en otra moneda.
     * @var float
     */
    public ?float $IVANoRetOtrMnda = 0;

    /**
     * Monto total del DTE en otra moneda.
     * @var float
     */
    public ?float $MntTotOtrMnda = 0;
    public function __construct(
        ?Moneda $TpoMoneda = null,
        ?float $TpoCambio = 0,
        ?float $MntNetoOtrMnda = 0,
        ?float $MntExeOtrMnda = 0,
        ?float $MntFaeCarneOtrMnda = 0,
        ?float $MntMargComOtrMnda = 0,
        ?float $IVAOtrMnda = 0,
        ?array $ImpRetOtrMnda = [],
        ?float $IVANoRetOtrMnda = 0,
        ?float $MntTotOtrMnda = 0
    ) {
        $this->TpoMoneda = $TpoMoneda;
        $this->TpoCambio = $TpoCambio;
        $this->MntNetoOtrMnda = $MntNetoOtrMnda;
        $this->MntExeOtrMnda = $MntExeOtrMnda;
        $this->MntFaeCarneOtrMnda = $MntFaeCarneOtrMnda;
        $this->MntMargComOtrMnda = $MntMargComOtrMnda;
        $this->IVAOtrMnda = $IVAOtrMnda;
        $this->ImpRetOtrMnda = $ImpRetOtrMnda;
        $this->IVANoRetOtrMnda = $IVANoRetOtrMnda;
        $this->MntTotOtrMnda = $MntTotOtrMnda;
    }
}
