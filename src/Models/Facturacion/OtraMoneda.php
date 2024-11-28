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

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TpoMoneda = Moneda::NotSet;
        $this->TpoCambio = 0;
        $this->MntNetoOtrMnda = 0;
        $this->MntExeOtrMnda = 0;
        $this->MntFaeCarneOtrMnda = 0;
        $this->MntMargComOtrMnda = 0;
        $this->IVAOtrMnda = 0;
        $this->ImpRetOtrMnda = null;
        $this->IVANoRetOtrMnda = 0;
        $this->MntTotOtrMnda = 0;
    }

    /**
     * Getter para Tipo de cambio.
     */
    public function getTpoCambio(): float
    {
        return round($this->TpoCambio, 4);
    }

    /**
     * Setter para Tipo de cambio.
     */
    public function setTpoCambio(float $value): void
    {
        $this->TpoCambio = $value;
    }

    /**
     * Getter para Monto neto en otra moneda.
     */
    public function getMntNetoOtrMnda(): float
    {
        return round($this->MntNetoOtrMnda, 4);
    }

    /**
     * Setter para Monto neto en otra moneda.
     */
    public function setMntNetoOtrMnda(float $value): void
    {
        $this->MntNetoOtrMnda = $value;
    }

    /**
     * Getter para Monto exento en otra moneda.
     */
    public function getMntExeOtrMnda(): float
    {
        return round($this->MntExeOtrMnda, 4);
    }

    /**
     * Setter para Monto exento en otra moneda.
     */
    public function setMntExeOtrMnda(float $value): void
    {
        $this->MntExeOtrMnda = $value;
    }

    /**
     * Getter para Monto base faenamiento carne.
     */
    public function getMntFaeCarneOtrMnda(): float
    {
        return round($this->MntFaeCarneOtrMnda, 4);
    }

    /**
     * Setter para Monto base faenamiento carne.
     */
    public function setMntFaeCarneOtrMnda(float $value): void
    {
        $this->MntFaeCarneOtrMnda = $value;
    }

    /**
     * Getter para Monto base márgenes comercialización.
     */
    public function getMntMargComOtrMnda(): float
    {
        return round($this->MntMargComOtrMnda, 4);
    }

    /**
     * Setter para Monto base márgenes comercialización.
     */
    public function setMntMargComOtrMnda(float $value): void
    {
        $this->MntMargComOtrMnda = $value;
    }

    /**
     * Getter para IVA en otra moneda.
     */
    public function getIVAOtrMnda(): float
    {
        return round($this->IVAOtrMnda, 4);
    }

    /**
     * Setter para IVA en otra moneda.
     */
    public function setIVAOtrMnda(float $value): void
    {
        $this->IVAOtrMnda = $value;
    }

    /**
     * Getter para IVA no retenido.
     */
    public function getIVANoRetOtrMnda(): float
    {
        return round($this->IVANoRetOtrMnda, 4);
    }

    /**
     * Setter para IVA no retenido.
     */
    public function setIVANoRetOtrMnda(float $value): void
    {
        $this->IVANoRetOtrMnda = $value;
    }

    /**
     * Getter para Monto total en otra moneda.
     */
    public function getMntTotOtrMnda(): float
    {
        return round($this->MntTotOtrMnda, 4);
    }

    /**
     * Setter para Monto total en otra moneda.
     */
    public function setMntTotOtrMnda(float $value): void
    {
        $this->MntTotOtrMnda = $value;
    }
}
