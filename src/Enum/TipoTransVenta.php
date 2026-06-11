<?php

namespace SDKSimpleFactura\Enum;

/**
 * Tipo de transacción de venta.
 */
enum TipoTransVenta: int
{
    case NotSet = 0;
    case DelGiro = 1;
    case VentasQueNoSonDelGiroActivoFijoYOtros = 2;
    case VentaDeBienesInmueblesBBRR = 3;
    case NCEMR_SoloNCE = 4;
}
