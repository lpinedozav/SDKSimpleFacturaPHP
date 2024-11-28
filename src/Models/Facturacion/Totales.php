<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\Moneda;

class Totales
{
    /**
     * Tipo de moneda.
     * @var Moneda
     */
    public ?Moneda $TpoMoneda;

    /**
     * Monto neto del DTE.
     * @var float
     */
    public ?float $MntNeto;

    /**
     * Monto exento del DTE.
     * @var float
     */
    public ?float $MntExe;

    /**
     * Monto base faenamiento de carne.
     * @var int
     */
    public ?int $MntBase;

    /**
     * Monto base de márgenes de comercialización.
     * @var int
     */
    public ?int $MntMargenCom;

    /**
     * Tasa de IVA.
     * @var float
     */
    public ?float $TasaIVA;

    /**
     * Monto del IVA del DTE.
     * @var int
     */
    public ?int $IVA;

    /**
     * Monto del IVA propio.
     * @var int
     */
    public ?int $IVAProp;

    /**
     * Monto del IVA de terceros.
     * @var int
     */
    public ?int $IVATerc;

    /** @var ImpuestosRetenciones[] */
    public ?array $ImptoReten = [];

    /**
     * IVA no retenido.
     * @var int
     */
    public ?int $IVANoRet;

    /**
     * Crédito especial para empresas constructoras.
     * @var int
     */
    public ?int $CredEC;

    /**
     * Garantía por depósito de envases o embalajes.
     * @var int
     */
    public ?int $GrntDep;


    /** @var Comisiones[] */
    public ?array $Comisiones = [];

    /**
     * Monto total del DTE.
     * @var float
     */
    public ?float $MntTotal;

    /**
     * Monto no facturable.
     * @var int
     */
    public ?int $MontoNF;

    /**
     * Total de ventas o servicios del periodo.
     * @var int
     */
    public ?int $MontoPeriodo;

    /**
     * Saldo anterior.
     * @var int
     */
    public ?int $SaldoAnterior;

    /**
     * Valor a pagar total del documento.
     * @var int
     */
    public ?int $VlrPagar;
    public function __construct(
        ?Moneda $TpoMoneda = null,
        ?float $MntNeto = null,
        ?float $MntExe = null,
        ?int $MntBase = null,
        ?int $MntMargenCom = null,
        ?float $TasaIVA = null,
        ?int $IVA = null,
        ?int $IVAProp = null,
        ?int $IVATerc = null,
        ?array $ImptoReten = null,
        ?int $IVANoRet = null,
        ?int $CredEC = null,
        ?int $GrntDep = null,
        ?array $Comisiones = null,
        ?float $MntTotal = null,
        ?int $MontoNF = null,
        ?int $MontoPeriodo = null,
        ?int $SaldoAnterior = null,
        ?int $VlrPagar = null
    ) {
        $this->TpoMoneda = $TpoMoneda;
        $this->MntNeto = $MntNeto;
        $this->MntExe = $MntExe;
        $this->MntBase = $MntBase;
        $this->MntMargenCom = $MntMargenCom;
        $this->TasaIVA = $TasaIVA;
        $this->IVA = $IVA;
        $this->IVAProp = $IVAProp;
        $this->IVATerc = $IVATerc;
        $this->ImptoReten = $ImptoReten;
        $this->IVANoRet = $IVANoRet;
        $this->CredEC = $CredEC;
        $this->GrntDep = $GrntDep;
        $this->Comisiones = $Comisiones;
        $this->MntTotal = $MntTotal;
        $this->MontoNF = $MontoNF;
        $this->MontoPeriodo = $MontoPeriodo;
        $this->SaldoAnterior = $SaldoAnterior;
        $this->VlrPagar = $VlrPagar;
    }
}
