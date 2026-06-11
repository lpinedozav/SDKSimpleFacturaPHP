<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para agregar un cesionario (/cessions/cesionarios/agregar).
 */
class AddCessionaryRequest
{
    public ?Credenciales $Credenciales;
    public ?string $RutCesionario;
    public ?string $RazonSocial;
    public ?string $Direccion;
    public ?string $Correo;
    public ?int $Fono;
    public ?string $NombreContacto;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?string $RutCesionario = null,
        ?string $RazonSocial = null,
        ?string $Direccion = null,
        ?string $Correo = null,
        ?int $Fono = null,
        ?string $NombreContacto = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->RutCesionario = $RutCesionario;
        $this->RazonSocial = $RazonSocial;
        $this->Direccion = $Direccion;
        $this->Correo = $Correo;
        $this->Fono = $Fono;
        $this->NombreContacto = $NombreContacto;
    }
}
