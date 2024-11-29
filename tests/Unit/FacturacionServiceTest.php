<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\SimpleFacturaClient;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\TipoSobreEnvio;
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

    }

    public function testObtenerPdfDteAsync_ReturnsServerError_WhenInvalidDataIsProvided()
    {
        // Arrange: Crear la solicitud PDF con datos inválidos
        $solicitudPDF = new SolicitudDte(
            new Credenciales(
                rutEmisor: '', // Rut Emisor vacío (inválido)
                nombreSucursal: 'Casa Matriz'
            ),
            new DteReferenciadoExterno(
                folio: 0, // Folio inválido (debe ser mayor a 0)
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el PDF
        $result = $this->facturacionService->ObtenerPdfDteAsync($solicitudPDF)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(500, $result->Status, 'El estado de la respuesta debe ser 500.');
        $this->assertNull($result->Data, 'Los datos del PDF deben ser nulos en caso de error.');
        $this->assertNotNull($result->Errors, 'Los errores deben contener información sobre el problema.');
        $this->assertIsArray($result->Errors, 'Los errores deben ser un arreglo.');
    }

    public function testObtenerTimbreDteAsync_ReturnsOkResult_WhenTimbreIsGeneratedSuccessfully()
    {
        // Arrange: Crear la solicitud para obtener el timbre
        $solicitudTimbre = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6'
            ),
            new DteReferenciadoExterno(
                folio: 4117,
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el timbre
        $response = $this->facturacionService->ObtenerTimbreDteAsync($solicitudTimbre)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos del timbre no deben ser nulos.');
    }

    public function testObtenerTimbreDteAsync_ReturnsInternalServerError_WhenServerFails()
    {
        // Arrange: Crear la solicitud para obtener el timbre con datos válidos
        $solicitudTimbre = new SolicitudDte(
            new Credenciales(
                rutEmisor: ''
            ),
            new DteReferenciadoExterno(
                folio: 4117,
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el timbre
        $response = $this->facturacionService->ObtenerTimbreDteAsync($solicitudTimbre)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(500, $response->Status, 'El estado de la respuesta debe ser 500 (Internal Server Error).');
        $this->assertNull($response->Data, 'Los datos del timbre deben ser nulos en caso de error.');
        $this->assertNotNull($response->Message, 'El mensaje de error no debe ser nulo.');
       
    }

    public function testObtenerXmlDteAsync_ReturnsOkResult_WhenXmlDteIsSentSuccessfully()
    {
        // Arrange: Crear la solicitud para obtener el XML del DTE
        $solicitudXml = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6'
            ),
            new DteReferenciadoExterno(
                folio: 12553,
                codigoTipoDte: DTEType::BoletaElectronica, // Código tipo 39
                ambiente: Ambiente::Certificacion // Ambiente de certificación
            )
        );

        // Act: Llamar al servicio para obtener el XML del DTE
        $response = $this->facturacionService->ObtenerXmlDteAsync($solicitudXml)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos del XML no deben ser nulos.');
        $this->assertIsString($response->Data, 'El XML debe ser una cadena (contenido en formato base64).');
    }


    public function testObtenerXmlDteAsync_ReturnsInternalServerError_WhenServerFails()
    {
        // Arrange: Crear la solicitud con datos válidos
        $solicitudXml = new SolicitudDte(
            new Credenciales(
                rutEmisor: ''
            ),
            new DteReferenciadoExterno(
                folio: 12553,
                codigoTipoDte: DTEType::BoletaElectronica, // Código tipo 39
                ambiente: Ambiente::Certificacion // Ambiente de certificación
            )
        );

        // Act: Llamar al servicio para obtener el XML del DTE
        $response = $this->facturacionService->ObtenerXmlDteAsync($solicitudXml)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(500, $response->Status, 'El estado de la respuesta debe ser 500 (Internal Server Error).');
        $this->assertNull($response->Data, 'Los datos deben ser nulos en caso de error del servidor.');
        $this->assertNotNull($response->Message, 'El mensaje de error no debe ser nulo.');
        $this->assertNotNull($response->Errors, 'Los errores deben ser nulos en caso de error interno.');
    }

    public function testObtenerSobreXmlDteAsync_ReturnsOkResult_WhenXmlSobreIsGeneratedSuccessfully()
    {
        // Arrange: Crear la solicitud para obtener el sobre XML
        $solicitudXmlSobre = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6'
            ),
            new DteReferenciadoExterno(
                folio: 2393,
                codigoTipoDte: DTEType::FacturaElectronica, // Código tipo 33
                ambiente: Ambiente::Certificacion // Ambiente de certificación
            )
        );

        // Act: Llamar al servicio para obtener el sobre XML
        $response = $this->facturacionService->ObtenerSobreXmlDteAsync($solicitudXmlSobre, TipoSobreEnvio::AlSII)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos del sobre XML no deben ser nulos.');
        $this->assertIsString($response->Data, 'Los datos deben ser una cadena (contenido en formato base64).');
    }
}
