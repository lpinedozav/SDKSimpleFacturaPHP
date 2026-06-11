<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Usuario de la empresa (/empresas/usuarios).
 */
class UsuarioEnt
{
    public ?string $rut;
    public ?string $nombre;
    public ?string $apellidos;
    public ?string $email;

    public function __construct(
        ?string $rut = null,
        ?string $nombre = null,
        ?string $apellidos = null,
        ?string $email = null
    ) {
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
    }
}
