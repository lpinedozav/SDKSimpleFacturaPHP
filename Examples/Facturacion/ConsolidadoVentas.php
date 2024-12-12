<?php

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6'
    ),
    ambiente: Ambiente::Certificacion,
    desde: new DateTime("2023-10-25"), // Fecha desde
    hasta: new DateTime("2023-10-30")  // Fecha hasta
);

$response = $client->Facturacion->ConsolidadoVentasAsync($request)->wait();

// Manejar la respuesta
if ($response->Status === 200) {
    echo "Consolidado exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` mapeado o crudo
    print_r($response->Status); // Aquí se imprimirá el `data` mapeado o crudo

    foreach ($response->Data as $dte) {
        echo "-------------Consolidado----------------------\n";
        echo "Fecha: " . $dte->fecha->format('Y-m-d H:i:s') . "\n";
        echo "Tipo DTE: {$dte->tiposDTE}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}