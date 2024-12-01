<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum DTEType
 */
enum DTEType: int
{
    case NotSet = 0;
    case Factura = 30;
    case FacturaExenta = 32;
    case FacturaElectronica = 33;
    case FacturaElectronicaExenta = 34;
    case FacturaCompraElectronica = 46;
    case FacturaExportacionElectronica = 110;
    case NotaCreditoExportacionElectronica = 112;
    case NotaDebitoExportacionElectronica = 111;
    case GuiaDespachoElectronica = 52;
    case NotaDebitoElectronica = 56;
    case NotaCredito = 60;
    case NotaCreditoElectronica = 61;
    case BoletaElectronica = 39;
    case BoletaElectronicaExenta = 41;
    case LiquidacionFacturaElectronica = 43;

    /**
     * Obtiene la descripción del tipo de DTE.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return match ($this) {
            self::NotSet => "No Asignado",
            self::Factura => "Factura",
            self::FacturaExenta => "Factura Exenta",
            self::FacturaElectronica => "Factura Electrónica",
            self::FacturaElectronicaExenta => "Factura Electrónica Exenta",
            self::FacturaCompraElectronica => "Factura Compra Electrónica",
            self::FacturaExportacionElectronica => "Factura Exportación Electrónica",
            self::NotaCreditoExportacionElectronica => "Nota Credito Exportación Electrónica",
            self::NotaDebitoExportacionElectronica => "Nota Debito Exportación Electrónica",
            self::GuiaDespachoElectronica => "Guia Despacho Electrónica",
            self::NotaDebitoElectronica => "Nota Debito Electrónica",
            self::NotaCredito => "Nota Credito",
            self::NotaCreditoElectronica => "Nota Credito Electrónica",
            self::BoletaElectronica => "Boleta Electrónica",
            self::BoletaElectronicaExenta => "Boleta Exenta Electrónica",
            self::LiquidacionFacturaElectronica => "Liquidación Factura Electrónica",
        };
    }

    /**
     * Obtiene el valor XML correspondiente al tipo de DTE.
     *
     * @return string
     */
    public function getXmlEnum(): string
    {
        return match ($this) {
            self::NotSet => "",
            self::Factura => "30",
            self::FacturaExenta => "32",
            self::FacturaElectronica => "33",
            self::FacturaElectronicaExenta => "34",
            self::FacturaCompraElectronica => "46",
            self::FacturaExportacionElectronica => "110",
            self::NotaCreditoExportacionElectronica => "112",
            self::NotaDebitoExportacionElectronica => "111",
            self::GuiaDespachoElectronica => "52",
            self::NotaDebitoElectronica => "56",
            self::NotaCredito => "60",
            self::NotaCreditoElectronica => "61",
            self::BoletaElectronica => "39",
            self::BoletaElectronicaExenta => "41",
            self::LiquidacionFacturaElectronica => "43",
        };
    }
}
