<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum RejectionType
 */
enum RejectionType: int
{
    case RCD = 1;
    case RFP = 3;
    case RFT = 4;

    /**
     * Devuelve la descripción del tipo de respuesta.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return match ($this->value) {
            self::RCD => 'Reclamo al Contenido del Documento',
            self::RFP => 'Reclamo por Falta Parcial de Mercaderías',
            self::RFT => 'Reclamo por Falta Total de Mercaderías',
        };
    }
}
