<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\ListaProveedor;

/**
 * Request para actualizar la lista de un proveedor (/proveedor/update-lista).
 */
class ListaProveedorRequest
{
    public ?Credenciales $Credenciales;
    public ?string $RutProveedor;
    public ?ListaProveedor $ListaProveedor;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?string $RutProveedor = null,
        ?ListaProveedor $ListaProveedor = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->RutProveedor = $RutProveedor;
        $this->ListaProveedor = $ListaProveedor;
    }
}
