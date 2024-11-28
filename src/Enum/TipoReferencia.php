<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoReferenciaEnum
 */
enum TipoReferencia: int
{
    /**
     * No se ha definido un valor aún.
     */
    case NotSet = 0;

    /**
     * Anula documento de referencia.
     */
    case AnulaDocumentoReferencia = 1;

    /**
     * Corrige texto de documento de referencia.
     */
    case CorrigeTextoDocumentoReferencia = 2;

    /**
     * Corrige montos de documento de referencia.
     */
    case CorrigeMontos = 3;

    /**
     * Para Set de Pruebas.
     */
    case SetPruebas = 4;
}
