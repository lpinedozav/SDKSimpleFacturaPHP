<?php

namespace SDKSimpleFactura\Models\Request;

class BheReceptor
{
    public ?string $Rut;
    public ?string $Nombre;
    public ?string $Direccion;
    public ?string $Comuna;
    public ?int $Region;

    public function __construct(
        ?string $Rut = null,
        ?string $Nombre = null,
        ?string $Direccion = null,
        ?string $Comuna = null,
        ?int $Region = null
    ) {
        $this->Rut = $Rut;
        $this->Nombre = $Nombre;
        $this->Direccion = $Direccion;
        $this->Comuna = $Comuna;
        $this->Region = $Region;
    }
}
