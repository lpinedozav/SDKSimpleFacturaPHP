<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum IndicadorServicioEnum
 */
enum IndicadorServicio: int
{
    /**
     * No se ha asignado un valor aún.
     */
    case NotSet = 0;

    /**
     * Factura de servicios periódicos domiciliarios.
     */
    case FacturaServiciosPeriodicosDomiciliarios = 1;

    /**
     * Factura de otros servicios periódicos.
     */
    case FacturaOtrosServiciosPeriodicos = 2;

    /**
     * Factura de servicios.
     */
    case FacturaServicios = 3;

    /**
     * Servicios de hotelería.
     */
    case ServiciosHoteleria = 4;

    /**
     * Servicios de transporte terrestre internacional.
     */
    case ServicioTransporteTerrestreInternacional = 5;

    /**
     * Boleta de servicios periódicos.
     */
    case BoletaServiciosPeriodicos = 1;

    /**
     * Boleta de servicios periódicos domiciliarios.
     */
    case BoletaServiciosPeriodicosDomiciliarios = 2;

    /**
     * Boleta de ventas y servicios.
     */
    case BoletaVentasYServicios = 3;

    /**
     * Boleta de espectáculos por terceros.
     */
    case BoletaEspectaculosPorTerceros = 4;
}
