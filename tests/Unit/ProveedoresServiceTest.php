<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\RejectionType;
use SDKSimpleFactura\Enum\ResponseType;
use SDKSimpleFactura\Interfaces\IProovedoresService;
use SDKSimpleFactura\Models\Request\AcuseReciboExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\SimpleFacturaClient;
use Symfony\Component\String\ByteString;

class ProveedoresServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private ?IProovedoresService $proveedoresService;

    protected function setUp(): void
    {
        $this->simpleFacturaClient = new SimpleFacturaClient();
        $this->proveedoresService = $this->simpleFacturaClient->Proveedores;
    }

    public function testAcuseReciboAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $request = new AcuseReciboExternoRequest(
            credenciales: new Credenciales(
                rutEmisor: '',
                rutContribuyente: '76372100-0',
                nombreSucursal: 'Casa Matriz'
            ),
            dteReferenciadoExterno: new DteReferenciadoExterno(
                folio: 220,
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            ),
            respuesta: ResponseType::Rejected,
            tipoRechazo: RejectionType::RCD,
            comentario: 'test'
        );

        // Act
        $response = $this->proveedoresService->acuseReciboAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
    }
    
    public function testListadoDtesRecibidosAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6'
            ),
            ambiente: Ambiente::Produccion,
            folio: null,
            codigoTipoDte: null,
            desde: new DateTime("2024-04-01"), // Fecha desde
            hasta: new DateTime("2024-04-30")  // Fecha hasta
        );

        // Act
        $response = $this->proveedoresService->listadoDtesRecibidosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
        $this->assertTrue(count($response->Data) > 0, 'La respuesta debe contener datos.');
        $this->assertEquals("Lista de Dtes Recibidos (" . count($response->Data) . ")", $response->Message);
    }

    
    public function testListadoDtesRecibidosAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '' // Valor inválido para provocar un error
            ),
            ambiente: Ambiente::Produccion,
            folio: null,
            codigoTipoDte: null,
            desde: new DateTime("2024-04-01"), // Fecha desde
            hasta: new DateTime("2024-04-30")  // Fecha hasta
        );

        // Act
        $response = $this->proveedoresService->listadoDtesRecibidosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertContains("Rut de emisor vacio", $response->Errors);
    }

    public function testObtenerXmlAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                rutContribuyente: '96689310-9'
            ),
            ambiente: Ambiente::Produccion,
            folio: 7366834,
            codigoTipoDte: DTEType::NotaCreditoElectronica
        );

        // Act
        $response = $this->proveedoresService->obtenerXmlAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
        $this->assertEquals('Success',$response->Message);
    }

    public function testObtenerXmlAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '', 
                rutContribuyente: '96689310-9'
            ),
            ambiente: Ambiente::Produccion,
            folio: 7366834,
            codigoTipoDte: DTEType::NotaCreditoElectronica
        );

        // Act
        $response = $this->proveedoresService->obtenerXmlAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
        $this->assertEquals("Error al obtener dtes recibidos desde api",$response->Data);
    }

    public function testObtenerPDFAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                rutContribuyente: '76269769-6'
            ),
            ambiente: Ambiente::Certificacion,
            folio: 2232,
            codigoTipoDte: DTEType::FacturaElectronica
        );

        // Act
        $response = $this->proveedoresService->obtenerPDFAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
        $this->assertIsString($response->Data, 'El tipo de dato debe ser string.');
    }

    public function testObtenerPDFAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '', // Valor inválido para provocar un error
                rutContribuyente: '76269769-6'
            ),
            ambiente: Ambiente::Certificacion,
            folio: 2232,
            codigoTipoDte: DTEType::FacturaElectronica
        );

        // Act
        $response = $this->proveedoresService->obtenerPDFAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
       
    }

    public function testConciliarRecibidosAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $credenciales = new Credenciales(
            rutEmisor: "76269769-6"
        );

        $mes = 5;
        $anio = 2024;

        // Act
        $response = $this->proveedoresService->conciliarRecibidosAsync($credenciales, $mes, $anio)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
    }

    public function testConciliarRecibidosAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $credenciales = new Credenciales(
            rutEmisor: "" // Valor inválido para provocar un error
        );

        $mes = 5;
        $anio = 2024;

        // Act
        $response = $this->proveedoresService->conciliarRecibidosAsync($credenciales, $mes, $anio)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');

    }
}