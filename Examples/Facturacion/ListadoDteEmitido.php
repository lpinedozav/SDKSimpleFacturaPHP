<?php

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "10422710-4",
        nombreSucursal: 'Casa Matriz'
    ),
    ambiente: Ambiente::Certificacion,
    folio: 0,
    codigoTipoDte: DTEType::NotSet,
    desde: new DateTime('2024-08-01'), // Fecha desde
    hasta: new DateTime('2024-08-17')  // Fecha hasta
);

// Llamar al servicio
$response = $client->Facturacion->ListadoDtesEmitidosAsync($request)->wait();

// Manejar la respuesta
if ($response->Status === 200) {
    echo "Listado de DTEs emitidos exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` mapeado o crudo
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}