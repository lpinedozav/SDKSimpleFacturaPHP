<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\Interfaces\IBoletasHonorarioService;
use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\Credenciales;
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
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $result->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($result->Data, 'Los datos del PDF no deben ser nulos.');
        $this->assertIsString($result->Data, 'Los datos deben ser una cadena (contenido del PDF en bytes).');
    }
}