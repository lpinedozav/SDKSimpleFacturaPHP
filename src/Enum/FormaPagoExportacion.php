<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum FormaPagoExportacionEnum
 */
enum FormaPagoExportacion: int
{
    /**
     * No se ha asignado un valor aún.
     */
    case NotSet = 0;

    /**
     * COB1.
     */
    case COB1 = 1;

    /**
     * ACRED.
     */
    case ACRED = 11;

    /**
     * CBOF.
     */
    case CBOF = 12;

    /**
     * COBRANZA.
     */
    case COBRANZA = 2;

    /**
     * SINPAGO.
     */
    case SINPAGO = 21;

    /**
     * ANTICIPO.
     */
    case ANTICIPO = 32;
}
