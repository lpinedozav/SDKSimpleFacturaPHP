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
        // Iterar sobre el backtrace para encontrar el primer archivo fuera del SDK
        $backtrace = debug_backtrace();
        $callerFile = null;
        foreach ($backtrace as $trace) {
            if (isset($trace['file']) && strpos($trace['file'], 'vendor') === false) {
                $callerFile = $trace['file'];
                break;
            }
        }
        $callerDir = $callerFile ? dirname($callerFile) : null;

        // Rutas posibles
        $possiblePaths = [];

        // Verificar si $callerDir está definido
        if ($callerDir) {
            $possiblePaths[] = $callerDir . '/appsettings.json'; // Directorio del script que instancia el cliente
        }

        // Agregar el directorio actual de ejecución (getcwd)
        $possiblePaths[] = getcwd() . '/appsettings.json';

        // Ruta alternativa si no se encuentra
        $possiblePaths[] = __DIR__ . '/../../../../appsettings.json';

        // Intentar encontrar el archivo en las rutas posibles
        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        // Si no se encuentra el archivo, lanzar una excepción con detalles de las rutas buscadas
        throw new \Exception("No se encontró el archivo de configuración appsettings.json en las rutas buscadas: " . implode(', ', $possiblePaths));
    }
}
