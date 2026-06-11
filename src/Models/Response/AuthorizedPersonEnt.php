<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Persona autorizada de cesión (/cessions/personasAutorizadas).
 */
class AuthorizedPersonEnt
{
    public ?string $rutPersonaAutorizada;
    public ?string $nombre;
    public ?string $correo;
    public ?bool $activo;

    public function __construct(
        ?string $rutPersonaAutorizada = null,
        ?string $nombre = null,
        ?string $correo = null,
        ?bool $activo = null
    ) {
        $this->rutPersonaAutorizada = $rutPersonaAutorizada;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->activo = $activo;
    }
}
