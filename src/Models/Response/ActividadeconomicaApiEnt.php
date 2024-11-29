<?php

namespace SDKSimpleFactura\Models\Response;

class ActividadeconomicaApiEnt
{
    public ?int $codigo;

    public ?string $descripcion;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?int $codigo = null,
        ?string $descripcion = null
    ) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
    }
}
