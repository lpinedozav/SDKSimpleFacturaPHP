<?php

namespace SDKSimpleFactura;

use DI\ContainerBuilder;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Services\ApiService;
use SDKSimpleFactura\Services\FacturacionService;
use SDKSimpleFactura\Interfaces\IFacturacionService;

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
        ]);

        return $builder->build();
    }
}