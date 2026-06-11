<?php

namespace SDKSimpleFactura\Enum;

/**
 * Medio de pago para boletas electrónicas.
 */
enum MedioPagoBoleta: int
{
    case NotSet = 0;
    case Efectivo = 1;
    case PagoElectronico = 2;
    case TransferenciaElectronica = 3;
    case Cheque = 4;
    case Otro = 5;
}
