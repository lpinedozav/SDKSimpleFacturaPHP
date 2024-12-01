
<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\DependencyInjectionConfig;
use SDKSimpleFactura\Interfaces\ISucursalService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;

class SucursalServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private ISucursalService $_sucursalService;

    protected function setUp(): void
    {
        $container = DependencyInjectionConfig::configureServices();

        // Crear una instancia de SimpleFacturaClient usando el contenedor
        $this->simpleFacturaClient = new SimpleFacturaClient($container);
        $this->_sucursalService = $this->simpleFacturaClient->Sucursal;
    }
    public function testListadoSucursalesAsync_ReturnsOkResult_WhenApiCallIsSuccessfully():void
    {
        $request = new Credenciales(
            rutEmisor: '76269769-6',
        );
        $response = $this->_sucursalService->ListadoSucursalesAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->Status);
        $this->assertEquals('Sucursales', $response->Message);
        $this->assertTrue(count($response->Data) >= 0);
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testListadoSucursalesAsync_ReturnsError_WhenApiCallIsFail():void
    {
        $request = new Credenciales(
            rutEmisor: '',
        );
        $response = $this->_sucursalService->ListadoSucursalesAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(400, $response->Status);
        $this->assertFalse($response->Data);
        $this->assertEquals('Error interno', $response->Message);
        $this->assertContains('Rut de emisor vacio', $response->Errors, 'Los errores deben contener el mensaje esperado.');
    }
}