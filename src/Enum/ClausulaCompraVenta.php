<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum ClausulaCompraVenta
 */
enum ClausulaCompraVenta: int
{
    case NotSet = 0;
    case CIF = 1;
    case CFR = 2;
    case EXW = 3;
    case FAS = 4;
    case FOB = 5;
    case S_CLAUSULA = 6;
    case DDP = 9;
    case FCA = 10;
    case CPT = 11;
    case CIP = 12;
    case DAT = 17;
    case DAP = 18;
    case OTROS = 8;

    /**
     * Devuelve el valor XML asociado al enum.
     *
     * @return string
     */
    public function getXmlValue(): string
    {
        return match ($this) {
            self::NotSet => '',
            self::CIF => '1',
            self::CFR => '2',
            self::EXW => '3',
            self::FAS => '4',
            self::FOB => '5',
            self::S_CLAUSULA => '6',
            self::DDP => '9',
            self::FCA => '10',
            self::CPT => '11',
            self::CIP => '12',
            self::DAT => '17',
            self::DAP => '18',
            self::OTROS => '8',
        };
    }
}
