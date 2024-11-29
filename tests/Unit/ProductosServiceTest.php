<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\Interfaces\IProductosService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\NuevoProductoExternoRequest;
use SDKSimpleFactura\SimpleFacturaClient;

class ProductosServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private ?IProductosService $productosService;

    protected function setUp(): void
    {
        $this->simpleFacturaClient = new SimpleFacturaClient();
        $this->productosService = $this->simpleFacturaClient->Productos;
    }

    public function testAgregarProductosAsync_ReturnsOkResult_WhenProductIsAddedSuccessfully()
    {
        // Arrange
        $name = bin2hex(random_bytes(3)); // Genera un string aleatorio de 6 caracteres

        // Crear las credenciales
        $credenciales = new Credenciales(
            rutEmisor: '76269769-6',
            nombreSucursal: 'Casa Matriz'
        );

        // Crear la solicitud de productos
        $producto = new NuevoProductoExternoRequest(
            nombre: $name,
            codigoBarra: $name,
            precio: 50.0,
            unidadMedida: 'un',
            exento: false,
            tieneImpuestos: false,
            impuestos: [0]
        );

        // Crear la solicitud principal
        $request = new DatoExternoRequest(
            credenciales: $credenciales,
            productos: [$producto]
        );

        // Act
        $response = $this->productosService->agregarProductosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertEquals("Nuevos Productos", $response->Message);
        $this->assertTrue(count($response->Data) > 0, 'La respuesta debe contener datos.');
    }

    public function testAgregarProductosAsync_ReturnsError_WhenProductAdditionFails()
    {
           // Crear las credenciales
        $credenciales = new Credenciales(
            rutEmisor: '76269769-6',
            nombreSucursal: 'Casa Matriz'
        );

        $producto = new NuevoProductoExternoRequest(
            nombre: 'Goma 901', 
            codigoBarra: 'goma901',
            precio: 50.0,
            unidadMedida: 'un',
            exento: false,
            tieneImpuestos: false,
            impuestos: [0]
        );

        // Crear la solicitud principal
        $request = new DatoExternoRequest(
            credenciales: $credenciales,
            productos: [$producto]
        );

        // Act
        $response = $this->productosService->agregarProductosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
    }

    public function testListarProductosAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $request = new Credenciales(
            rutEmisor: "76269769-6",
            nombreSucursal: "Casa Matriz"
        );

        // Act
        $response = $this->productosService->listarProductosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
        $this->assertTrue(count($response->Data) > 0, 'La respuesta debe contener datos.');
        
    }

    public function testListarProductosAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $request = new Credenciales(
            rutEmisor: "", // Valor inválido para provocar un error
            nombreSucursal: "Casa Matriz"
        );

        // Act
        $response = $this->productosService->listarProductosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
        $this->assertFalse($response->Data, 'Los datos no deben ser nulos.');
    }
}