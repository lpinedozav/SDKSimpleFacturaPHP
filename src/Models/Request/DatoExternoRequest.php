<?php

namespace SDKSimpleFactura\Models\Request;

class DatoExternoRequest
{
    public ?Credenciales $credenciales;
    /**
     * @var NuevoProductoExternoRequest[]|null
     */
    public ?array $productos;
    /**
     * @var NuevoReceptorExternoRequest[]|null
     */
    public ?array $clientes;


    public function __construct(Credenciales $credenciales, ?array $productos = null, ?array $clientes = null)
    {
        $this->credenciales = $credenciales;
        $this->productos = $productos;
        $this->clientes = $clientes;
    }
}
