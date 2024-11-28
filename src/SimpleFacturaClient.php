<?php
// src/SimpleFacturaClient.php
namespace SDKSimpleFactura;

use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IProductosService;
// ... otras importaciones de interfaces

class SimpleFacturaClient
{
    public $Facturacion;
    public $Productos;
    // ... otras propiedades de servicios

    public function __construct()
    {
        $container = DependencyInjectionConfig::configureServices();

        $this->Facturacion = $container->get(IFacturacionService::class);
        $this->Productos = $container->get(IProductosService::class);
        // ... obtener otros servicios de manera similar
    }
}
