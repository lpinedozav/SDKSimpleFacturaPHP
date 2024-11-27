<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum TipoSobreEnvio
 */
enum TipoSobreEnvio: int
{
    case AlSII = 0;
    case AlReceptor = 1;

    /**
     * Obtiene la descripción del tipo de sobre de envío.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return match ($this) {
            self::AlSII => "Al SII",
            self::AlReceptor => "Al Receptor",
        };
    }
}