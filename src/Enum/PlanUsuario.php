<?php

namespace SDKSimpleFactura\Enum;

/**
 * Planes disponibles para enrolamiento de empresas.
 */
enum PlanUsuario: int
{
    case Independiente = 100;
    case Pyme = 200;
    case Avanzado = 300;
    case Premium = 400;
}
