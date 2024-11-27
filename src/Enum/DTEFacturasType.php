<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum DTEFacturasType
 */
enum DTEFacturasType: int
{
    case NotSet = 0;
    case FacturaElectronica = 33;
    case FacturaElectronicaExcenta = 34;
    case FacturaCompraElectronica = 46;
    case LiquidacionFacturaElectronica = 43;

    /**
     * Obtiene el valor XML correspondiente al DTEFacturasType.
     *
     * @return string
     */
    public function getXmlEnum(): string
    {
        return match ($this) {
            self::NotSet => "",
            self::FacturaElectronica => "33",
            self::FacturaElectronicaExcenta => "34",
            self::FacturaCompraElectronica => "46",
            self::LiquidacionFacturaElectronica => "43",
        };
    }
}
