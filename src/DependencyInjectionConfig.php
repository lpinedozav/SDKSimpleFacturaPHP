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

        // Buscar el archivo appsettings.json en el entorno del cliente
        $configFilePath = self::findConfigFile();

        if (!$configFilePath) {
            throw new \Exception("No se encontró el archivo de configuración appsettings.json.");
        }

        // Leer la configuración desde el archivo encontrado
        $configData = json_decode(file_get_contents($configFilePath), true);

        if (!isset($configData['SDKSettings'])) {
            throw new \Exception("El archivo de configuración no contiene la sección 'SDKSettings'.");
        }

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
                ->constructor(\DI\get(IApiService::class)),
        ]);

        return $builder->build();
    }

    private static function findConfigFile()
    {
        // Obtener el archivo desde donde se instanció el cliente
        $backtrace = debug_backtrace();
        $callerFile = $backtrace[0]['file']; // Archivo del primer caller
        $callerDir = dirname($callerFile); // Directorio del caller
    
        // Rutas posibles
        $possiblePaths = [
            $callerDir . '/appsettings.json',        // En el directorio del script que instancia el cliente
            getcwd() . '/appsettings.json',          // Directorio actual de ejecución
            __DIR__ . '/../../data/appsettings.json' // Ubicación en el SDK
        ];
    
        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }
    
        return null; // Si no se encuentra el archivo
    }
}
