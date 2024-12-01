
<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\DependencyInjectionConfig;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Interfaces\IFolioService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\FolioRequest;
use SDKSimpleFactura\Models\Request\SolicitudFoliosRequest;
use SDKSimpleFactura\SimpleFacturaClient;

class FolioServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private IFolioService $_folioService;

    protected function setUp(): void
    {
        $container = DependencyInjectionConfig::configureServices();

        // Crear una instancia de SimpleFacturaClient usando el contenedor
        $this->simpleFacturaClient = new SimpleFacturaClient($container);
        $this->_folioService = $this->simpleFacturaClient->Folio;
    }
    public function testConsultaFoliosDisponiblesAsync_ReturnsOkResult_WhenApiCallIsSuccessfully():void
    {
        $request = new SolicitudFoliosRequest(
            rutEmpresa: '76269769-6',
            tipoDTE: 33,
            ambiente: 0
        );
        
        $response = $this->_folioService->ConsultaFoliosDisponiblesAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->Status);
        $this->assertEquals("El rut 76269769-6 tiene " . $response->Data . " folios disponibles del tipo 33", $response->Message);
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testConsultaFoliosDisponiblesAsync_ReturnsError_WhenApiCallIsFail():void
    {
        $request = new SolicitudFoliosRequest(
            rutEmpresa: '76269769-6',
            ambiente: 0
        );
        $response = $this->_folioService->ConsultaFoliosDisponiblesAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(400, $response->Status);
        $this->assertEquals('Falta tipo de codigo DTE', $response->Data);
        $this->assertEquals('Error al consultar folios disponibles directamente al SII', $response->Message);
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testSolicitarFoliosAsync_ReturnsOkResult_WhenFolioIsRequestedSuccessfully():void
    {
        
        $maxIntentos = 3;
        $intentoActual = 0;
        $exito = false;

        $ultimaExcepcion = null;

        while ($intentoActual < $maxIntentos && !$exito) {
            $intentoActual++;

            try {
                $request = new FolioRequest(
                    credenciales: new Credenciales(
                        rutEmisor: '76269769-6',
                        nombreSucursal: "Casa Matriz"
                    ),
                    cantidad: 1,
                    codigoTipoDte: DTEType::FacturaElectronica
                );
                $response = $this->_folioService->SolicitarFoliosAsync($request)->wait();
                $this->assertNotNull($response);
                $this->assertEquals(200, $response->Status);
                $this->assertEquals("El timbraje de tipo FACTURA ELECTRONICA con rangos desde ".$response->Data->desde. " hasta ".$response->Data->hasta. " fue ingresado correctamente", $response->Message);
                $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
                $exito = true;
            } catch (\Exception $ex) {
                $ultimaExcepcion = $ex;
                if ($intentoActual < $maxIntentos) {
                    sleep(1);
                }
            }
        }
        if (!$exito) {
            $this->fail("La prueba falló después de $maxIntentos intentos. Último error: {$ultimaExcepcion->getMessage()}");
        }
    }
    public function testSolicitarFoliosAsync_ReturnsError_WhenApiCallIsFail():void
    {
        $request = new FolioRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: "Casa Matriz"
            ),
            cantidad: 1,
        );
        $response = $this->_folioService->SolicitarFoliosAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(400, $response->Status);
        $this->assertFalse($response->Data);
        $this->assertEquals('Error interno',$response->Message);
        $this->assertContains('Codigo tipo dte no válido', $response->Errors, 'Los errores deben contener el mensaje esperado.');
    }
    public function testConsultarFoliosAsync_ReturnsOkResult_WhenApiCallIsSuccessfully():void
    {
        $request = new FolioRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: "Casa Matriz"
            ),
            ambiente: Ambiente::Certificacion,
            codigoTipoDte: null
        );
        $response = $this->_folioService->ConsultarFoliosAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->Status);
        $this->assertTrue(count($response->Data) >= 0);
        $this->assertEquals("",$response->Message);
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testConsultarFoliosAsync_ReturnsError_WhenApiCallIsFail():void
    {
        $request = new FolioRequest(
            credenciales: new Credenciales(
                nombreSucursal: "Casa Matriz"
            ),
            ambiente: Ambiente::Certificacion,
            codigoTipoDte: null
        );
        $response = $this->_folioService->ConsultarFoliosAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(400, $response->Status);
        $this->assertFalse($response->Data);
        $this->assertEquals('Error interno',$response->Message);
        $this->assertContains('Rut de emisor vacio', $response->Errors, 'Los errores deben contener el mensaje esperado.');
    }
    public function testFoliosSinUsoAsync_ReturnsOkResult_WhenApiCallIsSuccessfully():void
    {
        $request = new SolicitudFoliosRequest(
            rutEmpresa: '76269769-6',
            tipoDTE: 33,
            ambiente: 0
        );
        $response = $this->_folioService->FoliosSinUsoAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->Status);
        $this->assertEquals('Folios disponibles sin uso',$response->Message);
        $this->assertTrue(count($response->Data) >= 0);
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testFoliosSinUsoAsync_ReturnsError_WhenApiCallIsFail():void
    {
        $request = new SolicitudFoliosRequest(
            rutEmpresa: '76269769-6',
            ambiente: 0
        );
        $response = $this->_folioService->FoliosSinUsoAsync($request)->wait();
        $this->assertNotNull($response);
        $this->assertEquals(400, $response->Status);
        $this->assertEquals('Error al consultar folios disponibles directamente al SII',$response->Message);
        $this->assertEquals('Falta tipo de codigo DTE',$response->Data);
    }

}