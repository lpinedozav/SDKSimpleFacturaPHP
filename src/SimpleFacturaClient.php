<?php
// src/SimpleFacturaClient.php
namespace SDKSimpleFactura;

use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IProductosService;
// ... otras importaciones de interfaces

class SimpleFacturaClient
{
    public $Facturacion;
    public $ProductosService;
    // ... otras propiedades de servicios

    public function __construct()
    {
        $container = DependencyInjectionConfig::configureServices();

        $this->Facturacion = $container->get(IFacturacionService::class);
        $this->ProductosService = $container->get(IProductosService::class);
        // ... obtener otros servicios de manera similar
    }
}
