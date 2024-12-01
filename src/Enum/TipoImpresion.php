<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoImpresionEnum
 */
enum TipoImpresion: string
{
    /**
     * Impresión normal.
     */
    case Normal = 'N';

    /**
     * Impresión tipo ticket.
     */
    case Ticket = 'T';
}
