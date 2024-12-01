<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum AmbienteEnum
 */
enum Ambiente: int
{
    case Certificacion = 0;
    case Produccion = 1;
    /**
     * Obtiene la descripción del ambiente.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return match ($this) {
            self::Certificacion => "Certificación",
            self::Produccion => "Producción",
        };
    }
}
