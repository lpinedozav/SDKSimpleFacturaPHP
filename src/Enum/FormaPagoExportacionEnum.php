<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum FormaPagoExportacionEnum
 */
enum FormaPagoExportacionEnum: int
{
    case NotSet = 0;
    case COB1 = 1;
    case ACRED = 11;
    case CBOF = 12;
    case COBRANZA = 2;
    case SINPAGO = 21;
    case ANTICIPO = 32;

    /**
     * Devuelve el valor de XML asociado al enum.
     *
     * @return string
     */
    public function getXmlValue(): string
    {
        return match ($this) {
            self::NotSet => '',
            self::COB1 => '1',
            self::ACRED => '11',
            self::CBOF => '12',
            self::COBRANZA => '2',
            self::SINPAGO => '21',
            self::ANTICIPO => '32',
        };
    }
}
