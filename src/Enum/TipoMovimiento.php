<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoMovimientoEnum
 */
enum TipoMovimiento: string
{
    /**
     * Aún no se ha definido un valor.
     */
    case NotSet = '';
    case Descuento = 'D';
    case Recargo = 'R';
}
