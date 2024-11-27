<?php

namespace SDKSimpleFactura;

use SDKSimpleFactura\src\Services\FacturacionService;
use SDKSimpleFactura\Services\ProductosService;
use SDKSimpleFactura\Services\ProveedoresService;
// Importa todos los servicios aquí.

class SimpleFacturaClient
{
    public $Facturacion;
    public $Productos;
    public $Proveedores;
    // Agrega las demás propiedades.

    public function __construct(ApiService $apiService)
    {
        $this->Facturacion = new FacturacionService($apiService);
        $this->Productos = new ProductosService($apiService);
        $this->Proveedores = new ProveedoresService($apiService);
        // Inicializa los demás servicios.
    }
}
