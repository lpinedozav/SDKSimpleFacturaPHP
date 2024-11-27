<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum ExpresionDineroEnum
 */
enum ExpresionDinero: string
{
    /**
     * Aún no se ha definido un valor.
     */
    case NotSet = '';
    /**
     * El valor se expresa como porcentaje.
     */
    case Porcentaje = '%';
    /**
     * El valor se expresa en pesos.
     */
    case Pesos = '$';
}
