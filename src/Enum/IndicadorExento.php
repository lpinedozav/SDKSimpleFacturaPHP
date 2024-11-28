<?php

namespace SDKSimpleFactura\Enums;

/**
 * Enum IndicadorExentoEnum
 */
enum IndicadorExento: int
{
    /**
     * Aún no se ha definido un valor.
     */
    case NotSet = 0;

    /**
     * No afecto o exento de IVA.
     */
    case Exento = 1;

    /**
     * No facturable.
     */
    case NoFacturable = 2;

    /**
     * Devuelve la descripción del enum.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return match ($this) {
            self::NotSet => 'Aún no se ha definido un valor.',
            self::Exento => 'No afecto o exento de IVA.',
            self::NoFacturable => 'No facturable.',
        };
    }
}