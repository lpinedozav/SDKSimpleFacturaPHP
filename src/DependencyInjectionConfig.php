<?php

namespace SDKSimpleFactura;

use DI\ContainerBuilder;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IBoletasHonorarioService;
use SDKSimpleFactura\Interfaces\IClientesService;
use SDKSimpleFactura\Interfaces\IConfiguracionService;
use SDKSimpleFactura\Services\ApiService;
use SDKSimpleFactura\Services\FacturacionService;
use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IFolioService;
use SDKSimpleFactura\Interfaces\IProductosService;
use SDKSimpleFactura\Services\ProductosService;
use SDKSimpleFactura\Interfaces\IProovedoresService;
use SDKSimpleFactura\Interfaces\ISucursalService;
use SDKSimpleFactura\Services\BoletasHonorariosService;
use SDKSimpleFactura\Services\ClientesService;
use SDKSimpleFactura\Services\ConfiguracionService;
use SDKSimpleFactura\Services\FolioService;
use SDKSimpleFactura\Services\ProveedoresService;
use SDKSimpleFactura\Services\SucursalService;

class DependencyInjectionConfig
{
    public static function configureServices()
    {
        $builder = new ContainerBuilder();

        // Leer la configuración desde appsettings.json
        $configData = json_decode(file_get_contents(__DIR__ . '/appsettings.json'), true);
        $sdkSettings = $configData['SDKSettings'];

        // Agregar definiciones de servicios
        $builder->addDefinitions([
            'config' => $sdkSettings,
            IApiService::class => \DI\create(ApiService::class)
                ->constructor(\DI\get('config')),
            IFacturacionService::class => \DI\autowire(FacturacionService::class)
                ->constructor(\DI\get(IApiService::class)),
            IProductosService::class => \DI\autowire(ProductosService::class)
                ->constructor(\DI\get(IApiService::class)),
            IProovedoresService::class => \DI\autowire(ProveedoresService::class)
                ->constructor(\DI\get(IApiService::class)),
            IClientesService::class => \DI\autowire(ClientesService::class)
                ->constructor(\DI\get(IApiService::class)),
            ISucursalService::class => \DI\autowire(SucursalService::class)
                ->constructor(\DI\get(IApiService::class)),
            IFolioService::class => \DI\autowire(FolioService::class)
                ->constructor(\DI\get(IApiService::class)),
            IConfiguracionService::class => \DI\create(ConfiguracionService::class)
                ->constructor(\DI\get(IApiService::class)),
            IBoletasHonorarioService::class => \DI\create(BoletasHonorariosService::class)
                ->constructor(\DI\get(IApiService::class))

        ]);

        return $builder->build();
    }
}
