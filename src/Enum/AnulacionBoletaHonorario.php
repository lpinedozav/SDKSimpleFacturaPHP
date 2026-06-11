<?php

namespace SDKSimpleFactura\Enum;

/**
 * Motivos de anulación de una BHE.
 */
enum AnulacionBoletaHonorario: int
{
    case NotSet = 0;
    case ServicioNoPagado = 1;
    case ServicioNoEfectuado = 2;
    case ErrorDigitacion = 3;
}
