<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoDespachoEnum
 */
enum TipoDespacho: int
{
    /**
     * No se ha asignado un valor aún.
     */
    case NotSet = 0;

    /**
     * Despacho por cuenta del receptor del documento (cliente o vendedor en caso de Facturas de compra).
     */
    case Receptor = 1;

    /**
     * Despacho por cuenta del emisor a instalaciones del cliente.
     */
    case EmisorACliente = 2;

    /**
     * Despacho por cuenta del emisor a otras instalaciones (Ejemplo: entrega en Obra).
     */
    case EmisorAOtrasInstalaciones = 3;
}
