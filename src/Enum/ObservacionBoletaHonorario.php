<?php

namespace SDKSimpleFactura\Enum;

/**
 * Motivos de observación de una BHE recibida.
 */
enum ObservacionBoletaHonorario: int
{
    case NotSet = 0;
    case NoReconoceRelacion = 1;
    case NoReconoceEmisor = 2;
}
