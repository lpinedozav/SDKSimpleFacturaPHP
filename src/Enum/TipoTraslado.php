<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoTrasladoEnum
 */
enum TipoTraslado: int
{
    /**
     * No se ha asignado un valor aún.
     */
    case NotSet = 0;

    /**
     * Operación constituye venta, de acuerdo a la definición de "venta" establecida en el Artículo 2° del DL 825.
     */
    case OperacionConstituyeVenta = 1;

    /**
     * Venta por efectuar.
     */
    case VentaPorEfectuar = 2;

    /**
     * Consignaciones.
     */
    case Consignaciones = 3;

    /**
     * Entrega gratuita.
     */
    case EntregaGratuita = 4;

    /**
     * Traslados internos.
     */
    case TrasladosInternos = 5;

    /**
     * Otros traslados no venta.
     */
    case OtrosTrasladosNoVenta = 6;

    /**
     * Guía de devolución.
     */
    case GuiaDeDevolucion = 7;

    /**
     * Traslado para exportación. (No venta).
     */
    case TrasladoParaExportacion = 8;

    /**
     * Venta para exportación.
     */
    case VentaParaExportacion = 9;
}
