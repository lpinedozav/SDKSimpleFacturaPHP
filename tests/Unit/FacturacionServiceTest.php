<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\SimpleFacturaClient;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Interfaces\IFacturacionService;

class FacturacionServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private ?IFacturacionService $facturacionService;

    /**
     * Configuración inicial antes de cada test
     */
    protected function setUp(): void
    {
        $this->simpleFacturaClient = new SimpleFacturaClient();
        $this->facturacionService = $this->simpleFacturaClient->Facturacion;
    }

    /**
     * Test: ObtenerPdfDteAsync debe devolver un resultado exitoso
     */
    public function testObtenerPdfDteAsync_ReturnsOkResult_WhenPDFIsGeneratedSuccessfully()
    {
        // Arrange: Crear la solicitud PDF
        $solicitudPDF = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: 'Casa Matriz'
            ),
            new DteReferenciadoExterno(
                folio: 4117,
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el PDF
        $result = $this->facturacionService->ObtenerPdfDteAsync($solicitudPDF)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $result->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($result->Data, 'Los datos del PDF no deben ser nulos.');
        $this->assertIsString($result->Data, 'Los datos deben ser una cadena (contenido del PDF en bytes).');
        $this->assertNull($result->Message, 'El mensaje debe ser nulo.');
        $this->assertNull($result->Errors, 'Los errores deben ser nulos.');
    }
}
