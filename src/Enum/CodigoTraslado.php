<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum CodigoTrasladoEnum
 */
enum CodigoTraslado: int
{
    /**
     * No se ha asignado un valor aún.
     */
    case NotSet = 0;

    /**
     * Exportador
     */
    case Exportador = 1;

    /**
     * Agente de Aduana (En la devolución de mercaderías de Aduanas).
     */
    case AgenteAduana = 2;

    /**
     * Vendedor (Entre otros, se refiere a aquel Productor que vende mercadería con entrega en Zona Primaria).
     */
    case Vendedor = 3;

    /**
     * Contribuyente autorizado expresamente por el SII
     */
    case ContribuyenteAutorizado = 4;
}
