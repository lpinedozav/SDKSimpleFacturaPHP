<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\Interfaces\IConfiguracionService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;

class ConfiguracionServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private ?IConfiguracionService $configuracionService;

    /**
     * Configuración inicial antes de cada test
     */
    protected function setUp(): void
    {
        $this->simpleFacturaClient = new SimpleFacturaClient();
        $this->configuracionService = $this->simpleFacturaClient->Configuracion;
    }
    public function testDatosEmpresaAsync_ReturnsOkResult_WhenApiCallIsSuccessfully(): void
    {
        $request = new Credenciales(
            rutEmisor: '76269769-6'
        );
        $response = $this->configuracionService->DatosEmpresaAsync($request)->wait();
        $this->assertNotNull($response,'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data,'Los datos de la empresa no deben ser nulos.');
        $this->assertTrue(count($response->Errors) === 0, 'No debe haber errores.');
    }
    public function testDatosEmpresaAsync_ReturnsError_WhenApiCallIsFail(): void
    {
        $request = new Credenciales(
            rutEmisor: ''
        );
        $response = $this->configuracionService->DatosEmpresaAsync($request)->wait();
        $this->assertNotNull($response,'El resultado no debe ser nulo.');
        $this->assertEquals(500, $response->Status,'El estado de la respuesta debe ser 500.');
        $this->assertEquals($response->Data,'Error al obtener emisor desde api');
        $this->assertContains('Rut de emisor vacio', $response->Errors, 'Los errores deben contener el mensaje esperado.');
    }
}