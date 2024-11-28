<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\FormaPago;
use SDKSimpleFactura\Enum\FormaPagoExportacion;
use SDKSimpleFactura\Enum\IndicadorServicio;
use SDKSimpleFactura\Enum\MedioPago;
use SDKSimpleFactura\Enum\TipoCuentaPago;
use SDKSimpleFactura\Enum\TipoDespacho;
use SDKSimpleFactura\Enum\TipoImpresion;
use SDKSimpleFactura\Enum\TipoTraslado;

class IdentificacionDTE
{
    /**
     * Tipo de DTE Enum.
     * @var string
     */
    public ?DTEType $TipoDTE;

    /**
     * Folio del Documento Electrónico.
     * @var int
     */
    public ?int $Folio;

    /**
     * Fecha Emisión Contable del DTE.
     * @var DateTime
     */
    public ?DateTime $FchEmis;

    /**
     * Sólo para Notas de Crédito que no tienen derecho a Rebaja del Débito.
     * @var int
     */
    public ?int $IndNoRebaja;

    /**
     * Tipo de despacho Enum.
     * @var TipoDespacho
     */
    public ?TipoDespacho $TipoDespacho;

    /**
     * Indicador de traslado Enum.
     * @var TipoTraslado
     */
    public ?TipoTraslado $IndTraslado;

    /**
     * Modalidad de impresión Enum.
     * @var TipoImpresion
     */
    public ?TipoImpresion $TpoImpresion;

    /**
     * Indicador de servicio Enum.
     * @var IndicadorServicio
     */
    public ?IndicadorServicio $IndServicio;

    /**
     * Montos brutos.
     * @var int
     */
    public ?int $MntBruto;

    /**
     * Forma de pago Enum.
     * @var FormaPago
     */
    public ?FormaPago $FmaPago;

    /**
     * Forma de pago exportación Enum.
     * @var FormaPagoExportacion
     */
    public ?FormaPagoExportacion $FmaPagExp;

    /**
     * Fecha de cancelación.
     * @var DateTime
     */
    public ?DateTime $FchCancel;

    /**
     * Al momento de emitirse el documento.
     * @var int
     */
    public ?int $MntCancel;

    /**
     * Saldo insoluto.
     * @var int
     */
    public ?int $SaldoInsol;

    /**
     * Tabla de montos de pago.
     * Hasta 30 repeticiones.
     * @var MontoPagoItem[]
     */
    public ?array $MntPagos;

    /**
     * Periodo de facturación para servicios periódicos. Fecha desde.
     * @var DateTime
     */
    public ?DateTime $PeriodoDesde;

    /**
     * Periodo de facturación para servicios periódicos. Fecha hasta.
     * @var DateTime
     */
    public ?DateTime $PeriodoHasta;

    /**
     * Medio de pago Enum.
     * @var MedioPago
     */
    public ?MedioPago $MedioPago;

    /**
     * Tipo de cuenta de pago Enum.
     * @var TipoCuentaPago
     */
    public ?TipoCuentaPago $TpoCtaPago;

    /**
     * Número de cuenta de pago.
     * @var string
     */
    public ?string $NumCtaPago;

    /**
     * Banco de la cuenta de pago.
     * @var string
     */
    public ?string $BcoPago;

    /**
     * Término de pago código.
     * @var string
     */
    public ?string $TermPagoCdg;

    /**
     * Glosa que describe las condiciones del pago del documento.
     * @var string
     */
    public ?string $TermPagoGlosa;

    /**
     * Cantidad de días según el código de Términos de Pago.
     * @var int
     */
    public ?int $TermPagoDias;

    /**
     * Fecha de vencimiento.
     * @var DateTime
     */
    public ?DateTime $FchVenc;

    /**
     * Indicador de montos netos.
     * @var int
     */
    public ?int $IndMntNeto;
    public function __construct(
        ?DTEType $TipoDTE = null,
        ?int $Folio = null,
        ?DateTime $FchEmis = null,
        ?int $IndNoRebaja = null,
        ?TipoDespacho $TipoDespacho = null,
        ?TipoTraslado $IndTraslado = null,
        ?TipoImpresion $TpoImpresion = null,
        ?IndicadorServicio $IndServicio = null,
        ?int $MntBruto = null,
        ?FormaPago $FmaPago = null,
        ?FormaPagoExportacion $FmaPagExp = null,
        ?DateTime $FchCancel = null,
        ?int $MntCancel = null,
        ?int $SaldoInsol = null,
        ?array $MntPagos = null,
        ?DateTime $PeriodoDesde = null,
        ?DateTime $PeriodoHasta = null,
        ?MedioPago $MedioPago = null,
        ?TipoCuentaPago $TpoCtaPago = null,
        ?string $NumCtaPago = null,
        ?string $BcoPago = null,
        ?string $TermPagoCdg = null,
        ?string $TermPagoGlosa = null,
        ?int $TermPagoDias = null,
        ?DateTime $FchVenc = null,
        ?int $IndMntNeto = null
    ) {
        $this->TipoDTE = $TipoDTE;
        $this->Folio = $Folio;
        $this->FchEmis = $FchEmis;
        $this->IndNoRebaja = $IndNoRebaja;
        $this->TipoDespacho = $TipoDespacho;
        $this->IndTraslado = $IndTraslado;
        $this->TpoImpresion = $TpoImpresion;
        $this->IndServicio = $IndServicio;
        $this->MntBruto = $MntBruto;
        $this->FmaPago = $FmaPago;
        $this->FmaPagExp = $FmaPagExp;
        $this->FchCancel = $FchCancel;
        $this->MntCancel = $MntCancel;
        $this->SaldoInsol = $SaldoInsol;
        $this->MntPagos = $MntPagos;
        $this->PeriodoDesde = $PeriodoDesde;
        $this->PeriodoHasta = $PeriodoHasta;
        $this->MedioPago = $MedioPago;
        $this->TpoCtaPago = $TpoCtaPago;
        $this->NumCtaPago = $NumCtaPago;
        $this->BcoPago = $BcoPago;
        $this->TermPagoCdg = $TermPagoCdg;
        $this->TermPagoGlosa = $TermPagoGlosa;
        $this->TermPagoDias = $TermPagoDias;
        $this->FchVenc = $FchVenc;
        $this->IndMntNeto = $IndMntNeto;
    }
}
