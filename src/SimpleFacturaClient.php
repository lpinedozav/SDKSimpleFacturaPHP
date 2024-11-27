<?php
// src/SimpleFacturaClient.php
namespace SDKSimpleFactura;

use SDKSimpleFactura\Interfaces\IFacturacionService;
// ... otras importaciones de interfaces

class SimpleFacturaClient
{
    public $Facturacion;
    // ... otras propiedades de servicios

    public function __construct()
    {
        $container = DependencyInjectionConfig::configureServices();

        $this->Facturacion = $container->get(IFacturacionService::class);
        // ... obtener otros servicios de manera similar
    }
}
