<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para editar clientes (/editClients).
 */
class EditarClienteRequest
{
    public ?Credenciales $Credenciales;
    /** @var EditarReceptorExterno[]|null */
    public ?array $Clientes;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?array $Clientes = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Clientes = $Clientes;
    }
}
