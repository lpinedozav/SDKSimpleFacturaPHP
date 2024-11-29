<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\Interfaces\IProovedoresService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;

class ProveedoresServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private ?IProovedoresService $proveedoresService;

    protected function setUp(): void
    {
        $this->simpleFacturaClient = new SimpleFacturaClient();
        $this->proveedoresService = $this->simpleFacturaClient->Proovedores;
    }
}