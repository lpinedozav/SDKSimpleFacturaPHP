<?php

namespace SDKSimpleFactura\Models\Response;

class ReceptorEnt
{
    public ?string $rut;
    public ?string $comuna;
    public ?string $nombre;
    public ?string $direccion;
    public ?string $region;
    public function __construct(
        ?string $rut = null,
        ?string $comuna = null,
        ?string $nombre = null,
        ?string $direccion = null,
        ?string $region = null
    ) {
        $this->rut = $rut;
        $this->comuna = $comuna;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->region = $region;
    }
}