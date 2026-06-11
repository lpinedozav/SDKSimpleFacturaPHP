<?php
// src/SimpleFacturaClient.php
namespace SDKSimpleFactura;

use SDKSimpleFactura\Interfaces\IBoletasHonorarioService;
use SDKSimpleFactura\Interfaces\IClientesService;
use SDKSimpleFactura\Interfaces\IConfiguracionService;
use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IFolioService;
use SDKSimpleFactura\Interfaces\IProductosService;
use SDKSimpleFactura\Interfaces\IProovedoresService;
use SDKSimpleFactura\Interfaces\ISucursalService;
use SDKSimpleFactura\Interfaces\IUsuariosService;
use SDKSimpleFactura\Interfaces\ICesionesService;
use SDKSimpleFactura\Interfaces\IPaykuService;
use SDKSimpleFactura\Interfaces\IPartnersService;

class SimpleFacturaClient
{
    public $Facturacion;
    public $Productos;
    public $Proveedores;
    public $Clientes;
    public $Sucursal;
    public $Folio;
    public $Configuracion;
    public $BoletasHonorario;
    public $Usuarios;
    public $Cesiones;
    public $Payku;
    public $Partners;

    public function __construct()
    {
        $container = DependencyInjectionConfig::configureServices();
        $this->Facturacion = $container->get(IFacturacionService::class);
        $this->Productos = $container->get(IProductosService::class);
        $this->Proveedores = $container->get(IProovedoresService::class);
        $this->Clientes = $container->get(IClientesService::class);
        $this->Sucursal = $container->get(ISucursalService::class);
        $this->Folio = $container->get(IFolioService::class);
        $this->Configuracion = $container->get(IConfiguracionService::class);
        $this->BoletasHonorario = $container->get(IBoletasHonorarioService::class);
        $this->Usuarios = $container->get(IUsuariosService::class);
        $this->Cesiones = $container->get(ICesionesService::class);
        $this->Payku = $container->get(IPaykuService::class);
        $this->Partners = $container->get(IPartnersService::class);
    }
}
