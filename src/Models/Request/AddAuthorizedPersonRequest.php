<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para agregar una persona autorizada de cesión
 * (/cessions/personasAutorizadas/agregar).
 */
class AddAuthorizedPersonRequest
{
    public ?Credenciales $Credenciales;
    public ?string $RutPersonaAutorizada;
    public ?string $Nombre;
    public ?string $Correo;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?string $RutPersonaAutorizada = null,
        ?string $Nombre = null,
        ?string $Correo = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->RutPersonaAutorizada = $RutPersonaAutorizada;
        $this->Nombre = $Nombre;
        $this->Correo = $Correo;
    }
}
