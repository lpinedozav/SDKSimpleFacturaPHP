<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum IndicadorFacturacionExencionEnum
 */
enum IndicadorFacturacionExencion: int
{
    /**
     * Aún no se ha definido un valor.
     */
    case NotSet = 0;

    /**
     * No afecto o exento de IVA.
     * No se usa este campo si la factura es exenta en forma global.
     */
    case NoAfectoOExento = 1;

    /**
     * Producto o servicio no es facturable.
     */
    case ProductoOServicioNoFacturable = 2;

    /**
     * Garantía de depósito por envases.
     * (Cervezas, jugos, aguas minerales, bebidas analcohólicas u otros autorizados por resolución especial).
     */
    case GarantiaDeposito = 3;

    /**
     * Item no venta.
     * Para facturas y guías de despacho (esta última con indicador de tipo de traslado de bienes = 1) y este item no será facturado.
     */
    case ItemNoVenta = 4;

    /**
     * Item a rebajar. Para guías de despacho NO VENTA que rebajan guía anterior.
     * En el área de referencias se debe indicar la guía anterior.
     */
    case ItemARebajar = 5;

    /**
     * Producto o servicio no facturable negativo (excepto en liquidaciones-factura).
     */
    case ProductoOServicioNoFacturableNegativo = 6;
}
