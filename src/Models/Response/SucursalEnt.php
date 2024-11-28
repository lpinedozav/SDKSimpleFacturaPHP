<?php

namespace SDKSimpleFactura\Models\Response;

class SucursalEnt
{
    /**
     * Nombre de la sucursal.
     * @var string
     */
    public string $Nombre;

    /**
     * Dirección de la sucursal.
     * @var string
     */
    public string $Direccion;

    /**
     * Constructor para inicializar valores predeterminados.
     *
     * @param string $nombre
     * @param string $direccion
     */
    public function __construct(string $nombre = '', string $direccion = '')
    {
        $this->Nombre = $nombre;
        $this->Direccion = $direccion;
    }
}
