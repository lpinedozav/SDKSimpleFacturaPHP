<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum MedioPagoEnum
 */
enum MedioPago: string
{
    /**
     * No se ha definido un valor aún.
     */
    case NotSet = '';

    /**
     * Cheque.
     */
    case CH = 'CH';

    /**
     * Cheque a fecha.
     */
    case CF = 'CF';

    /**
     * Letra.
     */
    case LT = 'LT';

    /**
     * Efectivo.
     */
    case EF = 'EF';

    /**
     * Pago a cuenta corriente.
     */
    case PE = 'PE';

    /**
     * Tarjeta de crédito.
     */
    case TC = 'TC';

    /**
     * Otro.
     */
    case OT = 'OT';
}
