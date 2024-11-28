<?php

namespace SDKSimpleFactura\Enum;

enum TipoSalida: int
{
    case Base64 = 0;
    case XML = 1;

    public function getDescription(): string
    {
        return match ($this) {
            self::Base64 => 'Base64',
            self::XML => 'XML',
        };
    }
}
