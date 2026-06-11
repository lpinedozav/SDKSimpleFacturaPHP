<?php

namespace SDKSimpleFactura\Models\Request;

class BheDetalle
{
    public ?string $Nombre;
    public ?int $Valor;

    public function __construct(?string $Nombre = null, ?int $Valor = null)
    {
        $this->Nombre = $Nombre;
        $this->Valor = $Valor;
    }
}
