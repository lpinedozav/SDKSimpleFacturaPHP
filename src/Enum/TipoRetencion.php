<?php

namespace SDKSimpleFactura\Enum;

/**
 * Indica quién realiza la retención en una BHE.
 */
enum TipoRetencion: int
{
    case Receptor = 1;
    case Contribuyente = 2;
}
