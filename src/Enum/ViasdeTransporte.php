<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum ViasDeTransporte
 */
enum ViasDeTransporte: int
{
    case NotSet = 0;
    case MARITINA_FLUVIAL_Y_LACUSTRE = 1;
    case AEREO = 4;
    case POSTAL = 15;
    case FERROVIARIO = 6;
    case CARRETERO_O_TERRESTRE = 7;
    case ELEODUCTOS_GASOCUTOS = 8;
    case TENDIDO_ELECTRICO = 9;
    case OTRA = 10;
    case COURIER_AEREO = 11;

    public function getXmlValue(): string
    {
        return match ($this) {
            self::NotSet => '',
            self::MARITINA_FLUVIAL_Y_LACUSTRE => '1',
            self::AEREO => '4',
            self::POSTAL => '15',
            self::FERROVIARIO => '6',
            self::CARRETERO_O_TERRESTRE => '7',
            self::ELEODUCTOS_GASOCUTOS => '8',
            self::TENDIDO_ELECTRICO => '9',
            self::OTRA => '10',
            self::COURIER_AEREO => '11',
        };
    }
}
