<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Datos de la sucursal para enrolamiento de empresa.
 */
class SucursalEnrolamiento
{
    public ?string $Nombre;
    public ?string $Direccion;

    public function __construct(
        ?string $Nombre = 'Casa Matriz',
        ?string $Direccion = 'Dirección 1'
    ) {
        $this->Nombre = $Nombre;
        $this->Direccion = $Direccion;
    }
}
