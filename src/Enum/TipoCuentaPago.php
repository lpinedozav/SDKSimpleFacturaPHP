<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoCuentaPagoEnum
 */
enum TipoCuentaPago: string
{
    /**
     * No se ha definido un valor aún.
     */
    case NotSet = '';

    /**
     * Cuenta Corriente.
     */
    case CuentaCorriente = 'CORRIENTE';

    /**
     * Cuenta Ahorro.
     */
    case Ahorro = 'AHORRO';

    /**
     * Cuenta Vista.
     */
    case Vista = 'VISTA';

    /**
     * Otro.
     */
    case Otro = '';
}
