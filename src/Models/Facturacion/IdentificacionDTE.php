<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\FormaPago;
use SDKSimpleFactura\Enum\FormaPagoExportacion;
use SDKSimpleFactura\Enum\IndicadorServicio;
use SDKSimpleFactura\Enum\MedioPago;
use SDKSimpleFactura\Enum\TipoDespacho;
use SDKSimpleFactura\Enum\TipoImpresion;
use SDKSimpleFactura\Enum\TipoTraslado;

class IdentificacionDTE
{
    /**
     * Tipo de DTE Enum.
     * @var string
     */
    public DTEType $TipoDTE;

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
     * @var DateTime
     */
    public DateTime $FchEmis;

    /**
     * Sólo para Notas de Crédito que no tienen derecho a Rebaja del Débito.
     * @var int
     */
    public int $IndNoRebaja;

    /**
     * Tipo de despacho Enum.
     * @var string
     */
    public TipoDespacho $TipoDespacho;

    /**
     * Indicador de traslado Enum.
     * @var TipoTraslado
     */
    public TipoTraslado $IndTraslado;

    /**
     * Modalidad de impresión Enum.
     * @var TipoImpresion
     */
    public TipoImpresion $TpoImpresion;

    /**
     * Indicador de servicio Enum.
     * @var IndicadorServicio
     */
    public IndicadorServicio $IndServicio;

    /**
     * Montos brutos.
     * @var int
     */
    public int $MntBruto;

    /**
     * Forma de pago Enum.
     * @var FormaPago
     */
    public FormaPago $FmaPago;

    /**
     * Forma de pago exportación Enum.
     * @var FormaPagoExportacion
     */
    public FormaPagoExportacion $FmaPagExp;

    /**
     * Fecha de cancelación.
     * @var DateTime
     */
    public DateTime $FchCancel;

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
     * @var DateTime
     */
    public DateTime $PeriodoDesde;

    /**
     * Periodo de facturación para servicios periódicos. Fecha hasta.
     * @var DateTime
     */
    public DateTime $PeriodoHasta;

    /**
     * Medio de pago Enum.
     * @var MedioPago
     */
    public MedioPago $MedioPago;

    /**
     * Tipo de cuenta de pago Enum.
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
     * @var DateTime
     */
    public DateTime $FchVenc;

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
        $this->FchCancel = '';
        $this->MntCancel = 0;
        $this->SaldoInsol = 0;
        $this->MntPagos = [];
        $this->PeriodoDesde = '';
        $this->PeriodoHasta = '';
        $this->MedioPago = '';
        $this->TpoCtaPago = '';
        $this->NumCtaPago = '';
        $this->BcoPago = '';
        $this->TermPagoCdg = '';
        $this->TermPagoGlosa = '';
        $this->TermPagoDias = 0;
        $this->FchVenc = '';
        $this->IndMntNeto = 0;
    }
}
