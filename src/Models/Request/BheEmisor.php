<?php

namespace SDKSimpleFactura\Models\Request;

class BheEmisor
{
    public ?string $Rut;
    public ?int $Direccion;

    public function __construct(?string $Rut = null, ?int $Direccion = null)
    {
        $this->Rut = $Rut;
        $this->Direccion = $Direccion;
    }
}
