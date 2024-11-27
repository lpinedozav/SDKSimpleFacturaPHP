<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Totales
{
    /**
     * Tipo de moneda.
     * @var string
     */
    public string $TpoMoneda;

    /**
     * Monto neto del DTE.
     * @var float
     */
    public float $MntNeto;

    /**
     * Monto exento del DTE.
     * @var float
     */
    public float $MntExe;

    /**
     * Monto base faenamiento de carne.
     * @var int
     */
    public int $MntBase;

    /**
     * Monto base de márgenes de comercialización.
     * @var int
     */
    public int $MntMargenCom;

    /**
     * Tasa de IVA.
     * @var float
     */
    public float $TasaIVA;

    /**
     * Monto del IVA del DTE.
     * @var int
     */
    public int $IVA;

    /**
     * Monto del IVA propio.
     * @var int
     */
    public int $IVAProp;

    /**
     * Monto del IVA de terceros.
     * @var int
     */
    public int $IVATerc;

    /** @var ImpuestosRetenciones[] */
    public ?array $ImptoReten = [];

    /**
     * IVA no retenido.
     * @var int
     */
    public int $IVANoRet;

    /**
     * Crédito especial para empresas constructoras.
     * @var int
     */
    public int $CredEC;

    /**
     * Garantía por depósito de envases o embalajes.
     * @var int
     */
    public int $GrntDep;


    /** @var Comisiones[] */
    public array $Comisiones = [];

    /**
     * Monto total del DTE.
     * @var float
     */
    public float $MntTotal;

    /**
     * Monto no facturable.
     * @var int
     */
    public int $MontoNF;

    /**
     * Total de ventas o servicios del periodo.
     * @var int
     */
    public int $MontoPeriodo;

    /**
     * Saldo anterior.
     * @var int
     */
    public int $SaldoAnterior;

    /**
     * Valor a pagar total del documento.
     * @var int
     */
    public int $VlrPagar;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TpoMoneda = 'NotSet'; // Representa el valor por defecto en la enumeración
        $this->MntTotal = 0;
        $this->MntNeto = 0;
        $this->MntExe = 0;
        $this->MntBase = 0;
        $this->MntMargenCom = 0;
        $this->TasaIVA = 0;
        $this->IVA = 0;
        $this->IVAProp = 0;
        $this->IVATerc = 0;
        $this->ImptoReten = null;
        $this->IVANoRet = 0;
        $this->CredEC = 0;
        $this->GrntDep = 0;
        $this->Comisiones = null;
        $this->MontoNF = 0;
        $this->MontoPeriodo = 0;
        $this->SaldoAnterior = 0;
        $this->VlrPagar = 0;
    }
}
