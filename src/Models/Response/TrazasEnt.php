<?php

namespace SDKSimpleFactura\Models\Response;
class TrazasEnt{
    public ?string $fecha;
    public ?string $descripcion;

    public function __construct(
        ?string $fecha = null,
        ?string $descripcion = null
    ) {
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
    }
}