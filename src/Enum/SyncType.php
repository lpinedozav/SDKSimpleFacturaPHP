<?php

namespace SDKSimpleFactura\Enum;

/**
 * Tipo de sincronización con el SII.
 */
enum SyncType: int
{
    case Ventas = 1;
    case Compras = 2;
    case BheEmitidas = 3;
    case BheRecibidas = 4;
}
