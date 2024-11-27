<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum ModalidadVenta
 */
enum ModalidadVenta: int
{
    case NotSet = 0;
    case A_FIRME = 1;
    case BAJO_CONDICION = 2;
    case CONSIGNACION_LIBRE = 3;
    case CONSIGNACION_MINIMO_FIRME = 4;
    case SIN_PAGO = 9;

    /**
     * Devuelve el valor de XML asociado al enum.
     *
     * @return string
     */
    public function getXmlValue(): string
    {
        return match ($this) {
            self::NotSet => '',
            self::A_FIRME => '1',
            self::BAJO_CONDICION => '2',
            self::CONSIGNACION_LIBRE => '3',
            self::CONSIGNACION_MINIMO_FIRME => '4',
            self::SIN_PAGO => '9',
        };
    }
}
