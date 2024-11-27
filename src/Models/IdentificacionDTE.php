<?php

namespace SDKSimpleFactura\Models;

class IdentificacionDTE
{
    /**
     * Tipo de DTE.
     * @var string
     */
    public string $TipoDTE;

    /**
     * Folio del Documento Electrónico.
     * @var int
     */
    public int $Folio;

    /**
     * Fecha Emisión Contable del DTE (AAAA-MM-DD).
     * @var string
     */
    public string $FechaEmisionString;

    /**
     * Fecha Emisión Contable del DTE.
     * @var string
     */
    public string $FchEmis;

    /**
     * Sólo para Notas de Crédito que no tienen derecho a Rebaja del Débito.
     * @var int
     */
    public int $IndNoRebaja;

    /**
     * Tipo de despacho.
     * @var string
     */
    public string $TipoDespacho;

    /**
     * Indicador de traslado.
     * @var string
     */
    public string $IndTraslado;

    /**
     * Modalidad de impresión.
     * @var string
     */
    public string $TpoImpresion;

    /**
     * Indicador de servicio.
     * @var string
     */
    public string $IndServicio;

    /**
     * Montos brutos.
     * @var int
     */
    public int $MntBruto;

    /**
     * Forma de pago.
     * @var string
     */
    public string $FmaPago;

    /**
     * Forma de pago exportación.
     * @var string
     */
    public string $FmaPagExp;

    /**
     * Fecha de cancelación.
     * @var string
     */
    public string $FechaCancelacionString;

    /**
     * Al momento de emitirse el documento.
     * @var int
     */
    public int $MntCancel;

    /**
     * Saldo insoluto.
     * @var int
     */
    public int $SaldoInsol;

    /**
     * Tabla de montos de pago.
     * Hasta 30 repeticiones.
     * @var MontoPagoItem[]
     */
    public array $MntPagos;

    /**
     * Periodo de facturación para servicios periódicos. Fecha desde.
     * @var string
     */
    public string $PeriodoDesdeString;

    /**
     * Periodo de facturación para servicios periódicos. Fecha hasta.
     * @var string
     */
    public string $PeriodoHastaString;

    /**
     * Medio de pago.
     * @var string
     */
    public string $MedioPago;

    /**
     * Tipo de cuenta de pago.
     * @var string
     */
    public string $TpoCtaPago;

    /**
     * Número de cuenta de pago.
     * @var string
     */
    public string $NumCtaPago;

    /**
     * Banco de la cuenta de pago.
     * @var string
     */
    public string $BcoPago;

    /**
     * Término de pago código.
     * @var string
     */
    public string $TermPagoCdg;

    /**
     * Glosa que describe las condiciones del pago del documento.
     * @var string
     */
    public string $TermPagoGlosa;

    /**
     * Cantidad de días según el código de Términos de Pago.
     * @var int
     */
    public int $TermPagoDias;

    /**
     * Fecha de vencimiento.
     * @var string
     */
    public string $FechaVencimientoString;

    /**
     * Indicador de montos netos.
     * @var int
     */
    public int $IndMntNeto;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TipoDTE = '';
        $this->Folio = 0;
        $this->FechaEmisionString = '';
        $this->FchEmis = '';
        $this->IndNoRebaja = 0;
        $this->TipoDespacho = '';
        $this->IndTraslado = '';
        $this->TpoImpresion = 'N';
        $this->IndServicio = '';
        $this->MntBruto = 0;
        $this->FmaPago = '';
        $this->FmaPagExp = '';
        $this->FechaCancelacionString = '';
        $this->MntCancel = 0;
        $this->SaldoInsol = 0;
        $this->MntPagos = [];
        $this->PeriodoDesdeString = '';
        $this->PeriodoHastaString = '';
        $this->MedioPago = '';
        $this->TpoCtaPago = '';
        $this->NumCtaPago = '';
        $this->BcoPago = '';
        $this->TermPagoCdg = '';
        $this->TermPagoGlosa = '';
        $this->TermPagoDias = 0;
        $this->FechaVencimientoString = '';
        $this->IndMntNeto = 0;
    }
}
