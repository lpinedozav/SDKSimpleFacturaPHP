<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\Interfaces\IBoletasHonorarioService;
use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\ListaBHERequest;
use SDKSimpleFactura\SimpleFacturaClient;

class BoletasHonorariosServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private ?IBoletasHonorarioService $boletasHonorarioService;

    /**
     * Configuración inicial antes de cada test
     */
    protected function setUp(): void
    {
        $this->simpleFacturaClient = new SimpleFacturaClient();
        $this->boletasHonorarioService = $this->simpleFacturaClient->BoletasHonorario;
    }
    public function testObtenerPDFBHEEmitidaAsync_RetunsOkResult_WhenApiCallIsSuccessfully(): void
    {
        // Arrange: Crear la solicitud PDF
        $request = new BHERequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: "Casa Matriz"
            ),
            folio: 15
        );

        // Act: Llamar al servicio para obtener el PDF
        $result = $this->boletasHonorarioService->ObtenerPDFBHEEmitidaAsync($request)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($result, message: 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $result->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($result->Data, 'Los datos del PDF no deben ser nulos.');
        $this->assertIsString($result->Data, 'Los datos deben ser una cadena (contenido del PDF en bytes).');
    }
    public function testObtenerPDFBHEEmitidaAsync_RetunsError_WhenApiCallIsFail(): void
    {
        //Arrange
        $request = new BHERequest
        (
            credenciales: new Credenciales
            (
                rutEmisor: "76269769-6"
            ),
            //folio: 15
        );
        $result = $this->boletasHonorarioService->ObtenerPDFBHEEmitidaAsync($request)->wait();
        $this->assertNotNull($result, message: 'El resultado no debe ser nulo.');
        $this->assertEquals(400, $result->Status);
        $this->assertNull(actual: $result->message, message: 'Los datos del PDF deben ser nulos.');
        $this->assertNotNull($result->Errors, 'Los errores deben contener información sobre el problema.');
        $this->assertIsArray($result->Errors, 'Los errores deben ser un arreglo.');
    }
    public function testListadoBHEEmitidasAsync_ReturnsOkResult_WhenApiCallIsSuccessfully(): void
    {
        // Arrange: Crear la solicitud de lista BHE
        $request = new ListaBHERequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: 'Casa Matriz'
            ),
            folio: null,
            desde: new DateTime('2024-09-03'),
            hasta: new DateTime('2024-11-11')
        );

        // Act: Llamar al servicio para obtener la lista BHE
        $result = $this->boletasHonorarioService->ListadoBHEEmitidasAsync($request)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $result->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($result->Data, 'Los datos no deben ser nulos.');
        $this->assertEquals("Lista de Bhes (" . count($result->Data) . ")", $result->Message);
        $this->assertGreaterThanOrEqual(0, count($result->Data), 'La cantidad de datos debe ser mayor o igual a 0.');
    }
    public function testListadoBHEEmitidasAsync_ReturnsError_WhenApiCallIsFail(): void
    {
        // Arrange: Crear la solicitud de lista BHE
        $request = new ListaBHERequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: 'Casa Matriz'
            ),
            folio: null
        );

        // Act: Llamar al servicio para obtener la lista BHE
        $result = $this->boletasHonorarioService->ListadoBHEEmitidasAsync($request)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(400, $result->Status, 'El estado de la respuesta debe ser 400.');
        $this->assertEquals("Error interno", $result->Message, 'El mensaje de error debe ser el esperado.');
        $this->assertFalse($result->Data, 'Los datos deben ser falsos.');
        $this->assertContains('Si no se envían filtros de fecha, debe tener al menos un folio', $result->Errors, 'Los errores deben contener el mensaje esperado.');
    }
    public function testObtenerPDFBHERecibidosAsync_RetunsOkResult_WhenApiCallIsSuccessfully():void
    {
        $request = new BHERequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                rutContribuyente: "26429782-6",
            ),
            folio: 2
        );
        $result = $this->boletasHonorarioService->ObtenerPDFBHERecibidosAsync($request)->wait();
        $this->assertNotNull($result, message: 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $result->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($result->Data, 'Los datos del PDF no deben ser nulos.');
        $this->assertIsString($result->Data, 'Los datos deben ser una cadena (contenido del PDF en bytes).');
    }
    public function testObtenerPDFBHERecibidosAsync_RetunsError_WhenApiCallIsFail():void
    {
        $request = new BHERequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                rutContribuyente: "26429782-6",
            ),
            //folio: 2
        );
        $result = $this->boletasHonorarioService->ObtenerPDFBHERecibidosAsync($request)->wait();
        $this->assertNotNull($result, message: 'El resultado no debe ser nulo.');
        $this->assertEquals(expected: 400, actual: $result->Status);
        $this->assertEquals(expected: $result->Data, actual: 'Error al validar credenciales');
        $this->assertNotNull($result->Errors, 'Los errores deben contener información sobre el problema.');
        $this->assertIsArray($result->Errors, 'Los errores deben ser un arreglo.');
        $this->assertContains('Folio no puede ir vacío', $result->Errors, 'Los errores deben contener el mensaje esperado.');


    }
}