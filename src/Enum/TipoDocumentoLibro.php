<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoDocumentoLibro
 */
enum TipoDocumentoLibro: int
{
    case NotSet = 0;
    case FacturaManual = 30;
    case FacturaExentaManual = 32;
    case FacturaElectronica = 33;
    case FacturaExentaElectronica = 34;
    case BoletaVentasServicios = 36;
    case BoletaExenta = 38;
    case BoletaElectronica = 39;
    case LiquidacionFacturaManual = 40;
    case BoletaExentaElectronica = 41;
    case LiquidacionFacturaElectroncia = 43;
    case FacturaCompra = 45;
    case FacturaCompraElectronica = 46;
    case NotaDebito = 55;
    case NotaDebitoElectronica = 56;
    case NotaCredito = 60;
    case NotaCreditoElectronica = 61;
    case FacturaExportacion = 101;
    case FacturaVentaExentaAZonaFrancaPrimaria = 102;
    case Liquidacion = 103;
    case NotaDebitoExportacion = 104;
    case BoletaLiquidacion = 105;
    case NotaCreditoExportacion = 106;
    case SRF = 108;
    case FacturaTurista = 109;
    case LiquidacionRecibidaPorMandante = 900;
    case FacturaVentaaEmpresasTerritorioPreferencial = 901;
    case ConocimientoEmbarque = 902;
    case DUS = 903;
    case ZonaFranca_FacturaTraspaso = 904;
    case FacturaReexpedicion = 905;
    case BoletaVentaModuloZonaFranca = 906;
    case FacturaVentaModuloZonaFranca = 907;
    case ZonaFranca_FacturaVentaModuloZF = 909;
    case ZonaFranca_SolicitudTrasladoZF = 910;
    case DeclaracionIngresoZonaFrancaPrimaria = 912;
    case DIN = 914;
    case DeclaracionIngresoZonaFranca = 918;
    case ResumenVentasNacionalesPasajesSinFactura = 919;
    case OtroRegistroAumentaDebito = 920;
    case LiquidacionRecibidaMandatario = 921;
    case OtrosRegistrosDisminuyeDebito = 922;
    case FacturaExportacionElectronica = 110;
    case NotaDebitoExportacionElectronica = 111;
    case NotaCreditoExportacionElectronica = 112;
    case ResumenVentasInternacionalPasajesSinFactura = 924;
    case AjusteAumentoTipoCambio = 500;
    case AjusteDisminucionTipoCambio = 501;

    /**
     * Obtiene el valor XML correspondiente al TipoDocumentoLibro.
     *
     * @return string
     */
    public function getXmlEnum(): string
    {
        return match ($this) {
            self::NotSet => "",
            self::FacturaManual => "30",
            self::FacturaExentaManual => "32",
            self::FacturaElectronica => "33",
            self::FacturaExentaElectronica => "34",
            self::BoletaVentasServicios => "35",
            self::BoletaExenta => "38",
            self::BoletaElectronica => "39",
            self::LiquidacionFacturaManual => "40",
            self::BoletaExentaElectronica => "41",
            self::LiquidacionFacturaElectroncia => "43",
            self::FacturaCompra => "45",
            self::FacturaCompraElectronica => "46",
            self::NotaDebito => "55",
            self::NotaDebitoElectronica => "56",
            self::NotaCredito => "60",
            self::NotaCreditoElectronica => "61",
            self::FacturaExportacion => "101",
            self::FacturaVentaExentaAZonaFrancaPrimaria => "102",
            self::Liquidacion => "103",
            self::NotaDebitoExportacion => "104",
            self::BoletaLiquidacion => "105",
            self::NotaCreditoExportacion => "106",
            self::SRF => "108",
            self::FacturaTurista => "109",
            self::LiquidacionRecibidaPorMandante => "900",
            self::FacturaVentaaEmpresasTerritorioPreferencial => "901",
            self::ConocimientoEmbarque => "902",
            self::DUS => "903",
            self::ZonaFranca_FacturaTraspaso => "904",
            self::FacturaReexpedicion => "905",
            self::BoletaVentaModuloZonaFranca => "906",
            self::FacturaVentaModuloZonaFranca => "907",
            self::ZonaFranca_FacturaVentaModuloZF => "909",
            self::ZonaFranca_SolicitudTrasladoZF => "910",
            self::DeclaracionIngresoZonaFrancaPrimaria => "912",
            self::DIN => "914",
            self::DeclaracionIngresoZonaFranca => "918",
            self::ResumenVentasNacionalesPasajesSinFactura => "919",
            self::OtroRegistroAumentaDebito => "920",
            self::LiquidacionRecibidaMandatario => "921",
            self::OtrosRegistrosDisminuyeDebito => "922",
            self::FacturaExportacionElectronica => "110",
            self::NotaDebitoExportacionElectronica => "111",
            self::NotaCreditoExportacionElectronica => "112",
            self::ResumenVentasInternacionalPasajesSinFactura => "924",
            self::AjusteAumentoTipoCambio => "500",
            self::AjusteDisminucionTipoCambio => "501",
        };
    }
}
