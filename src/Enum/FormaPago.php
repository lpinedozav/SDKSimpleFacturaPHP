<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum FormaPagoEnum
 */
enum FormaPago: int
{
    /**
     * No se ha asignado un valor aún.
     */
    case NotSet = 0;

    /**
     * Contado.
     */
    case Contado = 1;

    /**
     * Crédito.
     */
    case Credito = 2;

    /**
     * Sin costo.
     */
    case SinCosto = 3;
}
