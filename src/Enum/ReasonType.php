<?php

namespace SDKSimpleFactura\Enum;

enum ReasonType: int
{
    const NotSet = 0;
    const ErrorDigitacion = 1;
    const ReclamoCliente = 2;
    const DatosDesactualizados = 3;
    const InteresesMora = 4;
    const InteresesCambioFecha = 5;
    const Otros = 6;

    /**
     * Devuelve la descripción del valor dado.
     *
     * @param int $value El valor del enum.
     * @return string La descripción asociada.
     */
    public static function getDescription($value)
    {
        $descriptions = [
            self::NotSet => "No Asignado",
            self::ErrorDigitacion => "Error de digitación",
            self::ReclamoCliente => "Reclamo de Cliente",
            self::DatosDesactualizados => "Datos Desactualizados",
            self::InteresesMora => "Intereses por Mora",
            self::InteresesCambioFecha => "Intereses por Cambio de Fecha",
            self::Otros => "Otros",
        ];

        return $descriptions[$value] ?? "Valor desconocido";
    }
}
