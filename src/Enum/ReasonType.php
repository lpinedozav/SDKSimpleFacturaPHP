<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum ReasonType
 */
enum ReasonType: int
{
    /**
     * No se ha asignado un valor aún.
     */
    case NotSet = 0;

    /**
     * Error de digitación.
     */
    case ErrorDigitacion = 1;

    /**
     * Reclamo de cliente.
     */
    case ReclamoCliente = 2;

    /**
     * Datos desactualizados.
     */
    case DatosDesactualizados = 3;

    /**
     * Intereses por mora.
     */
    case InteresesMora = 4;

    /**
     * Intereses por cambio de fecha.
     */
    case InteresesCambioFecha = 5;

    /**
     * Otros motivos.
     */
    case Otros = 6;

    /**
     * Devuelve la descripción del valor del enum.
     *
     * @return string La descripción asociada.
     */
    public function getDescription(): string
    {
        return match ($this) {
            self::NotSet => "No Asignado",
            self::ErrorDigitacion => "Error de digitación",
            self::ReclamoCliente => "Reclamo de Cliente",
            self::DatosDesactualizados => "Datos Desactualizados",
            self::InteresesMora => "Intereses por Mora",
            self::InteresesCambioFecha => "Intereses por Cambio de Fecha",
            self::Otros => "Otros",
        };
    }
}
