<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\DependencyInjectionConfig;
use SDKSimpleFactura\Interfaces\IClientesService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\NuevoReceptorExternoRequest;
use SDKSimpleFactura\SimpleFacturaClient;

class ClientesServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private IClientesService $_clientesService;

    protected function setUp(): void
    {
        $container = DependencyInjectionConfig::configureServices();

        // Crear una instancia de SimpleFacturaClient usando el contenedor
        $this->simpleFacturaClient = new SimpleFacturaClient($container);
        $this->_clientesService = $this->simpleFacturaClient->Clientes;
    }
    public function testAgregarClientesAsync_ReturnsOkResult_WhenApiCallIsSuccessfully():void
    {
        $credenciales = new Credenciales(
            rutEmisor: '76269769-6',
            nombreSucursal: 'Casa Matriz'
        );
        $clientes = new NuevoReceptorExternoRequest(
            rut: "57681892-0",
            razonSocial: "Cliente Test 1",
            giro: "Giro 1",
            dirPart: "direccion 1",
            dirFact: "direccion 1",
            correoPar: "correo 1",
            correoFact: "correo 1",
            ciudad: "Ciudad 1",
            comuna: "Comuna 1"
        );
        $request = new DatoExternoRequest(
            credenciales: $credenciales,
            clientes: [$clientes]
        );
        $response = $this->_clientesService->AgregarClientesAsync($request)->wait();
        $this->assertNotNull(actual: $response);
        $this->assertEquals(200, $response->Status);
        $this->assertEquals('Nuevos Clientes', $response->Message);
        $this->assertTrue(condition: count($response->Data) == 1);
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testAgregarClientesAsync_ReturnsError_WhenApiCallIsFail():void
    {
        $credenciales = new Credenciales(
            rutEmisor: '',
            nombreSucursal: 'Casa Matriz'
        );
        $clientes = new NuevoReceptorExternoRequest(
            rut: "57681892-0",
            razonSocial: "Cliente Test 1",
            giro: "Giro 1",
            dirPart: "direccion 1",
            dirFact: "direccion 1",
            correoPar: "correo 1",
            correoFact: "correo 1",
            ciudad: "Ciudad 1",
            comuna: "Comuna 1"
        );
        $request = new DatoExternoRequest(
            credenciales: $credenciales,
            clientes: [$clientes]
        );
        $response = $this->_clientesService->AgregarClientesAsync($request)->wait();
        $this->assertNotNull(actual: $response);
        $this->assertEquals(400, $response->Status);
        $this->assertFalse($response->Data);
        $this->assertEquals("Error interno", $response->Message);
        $this->assertContains('Rut de emisor vacio', $response->Errors, 'Los errores deben contener el mensaje esperado.');
    }
    public function testListarClientesAsync_ReturnsOkResult_WhenAPiCallIsSuccessfully():void
    {
        $request = new Credenciales(
            rutEmisor: '76269769-6'
        );
        $response = $this->_clientesService->ListarClientesAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->Status);
        $this->assertEquals('Clientes', $response->Message);
        $this->assertTrue(condition: count($response->Data) > 0);
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testListarClientesAsync_ReturnsError_WhenApiCallIsFail():void
    {
        $request = new Credenciales(
            rutEmisor: ''
        );
        $response = $this->_clientesService->ListarClientesAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(400, $response->Status);
        $this->assertFalse($response->Data);
        $this->assertEquals('Error interno', $response->Message);
        $this->assertContains('Rut de emisor vacio', $response->Errors, 'Los errores deben contener el mensaje esperado.');
    }
} 