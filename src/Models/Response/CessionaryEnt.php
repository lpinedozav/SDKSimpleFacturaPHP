<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Cesionario (/cessions/cesionarios).
 */
class CessionaryEnt
{
    public ?string $rutCesionario;
    public ?string $razonSocial;
    public ?string $direccion;
    public ?string $correo;
    public ?int $fono;
    public ?string $nombreContacto;
    public ?bool $activo;

    public function __construct(
        ?string $rutCesionario = null,
        ?string $razonSocial = null,
        ?string $direccion = null,
        ?string $correo = null,
        ?int $fono = null,
        ?string $nombreContacto = null,
        ?bool $activo = null
    ) {
        $this->rutCesionario = $rutCesionario;
        $this->razonSocial = $razonSocial;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->fono = $fono;
        $this->nombreContacto = $nombreContacto;
        $this->activo = $activo;
    }
}
