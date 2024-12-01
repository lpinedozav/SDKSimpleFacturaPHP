<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum DOCType
 */
enum DOCType: int
{
    case NotSet = 0;
    case FacturaElectronica = 33;
    case FacturaElectronicaExenta = 34;
    case FacturaCompraElectronica = 46;
    case GuiaDespachoElectronica = 52;
    case NotaDebitoElectronica = 56;
    case NotaCreditoElectronica = 61;

    /**
     * Obtiene el valor XML correspondiente al DOCType.
     *
     * @return string
     */
    public function getXmlEnum(): string
    {
        return match ($this) {
            self::NotSet => "",
            self::FacturaElectronica => "33",
            self::FacturaElectronicaExenta => "34",
            self::FacturaCompraElectronica => "46",
            self::GuiaDespachoElectronica => "52",
            self::NotaDebitoElectronica => "56",
            self::NotaCreditoElectronica => "61",
        };
    }
}
