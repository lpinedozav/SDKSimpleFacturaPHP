<?php

namespace SDKSimpleFactura\Enum;

/**
 * Enum ResponseType
 */
enum ResponseType: int
{
    case Accepted = 3;
    case AcceptedWithQualms = 4;
    case Rejected = 5;

    /**
     * Devuelve la descripción del tipo de respuesta.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return match ($this->value) {
            self::Accepted => 'Aceptado',
            self::AcceptedWithQualms => 'Aceptado con reparos',
            self::Rejected => 'Rechazado',
        };
    }
}
