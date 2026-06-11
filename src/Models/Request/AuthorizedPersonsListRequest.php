<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para listar personas autorizadas de cesión
 * (/cessions/personasAutorizadas).
 */
class AuthorizedPersonsListRequest
{
    public ?Credenciales $Credenciales;

    public function __construct(?Credenciales $Credenciales = null)
    {
        $this->Credenciales = $Credenciales;
    }
}
