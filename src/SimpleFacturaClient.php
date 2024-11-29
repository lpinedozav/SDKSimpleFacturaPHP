<?php
// src/SimpleFacturaClient.php
namespace SDKSimpleFactura;

use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IProductosService;
use SDKSimpleFactura\Interfaces\IProovedoresService;
// ... otras importaciones de interfaces

class SimpleFacturaClient
{
    public $Facturacion;
    public $Productos;

    public $Proovedores;
    // ... otras propiedades de servicios

    public function __construct()
    {
        $container = DependencyInjectionConfig::configureServices();

        $this->Facturacion = $container->get(IFacturacionService::class);
        $this->Productos = $container->get(IProductosService::class);
        $this->Proovedores = $container->get(IProovedoresService::class);
        // ... obtener otros servicios de manera similar
    }
}
