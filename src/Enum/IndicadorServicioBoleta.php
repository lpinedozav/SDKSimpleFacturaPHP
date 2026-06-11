<?php

namespace SDKSimpleFactura\Enum;

/**
 * Indicador de servicio para boletas electrónicas.
 */
enum IndicadorServicioBoleta: int
{
    case NotSet = 0;
    case BoletaServiciosPeriodicos = 1;
    case BoletaServiciosPeriodicosDomiciliarios = 2;
    case BoletaVentasYServicios = 3;
    case BoletaEspectaculosPorTerceros = 4;
}
