<?php

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\ListaBHERequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new ListaBHERequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        nombreSucursal: "Casa Matriz"
    ),
    folio: null,
    desde: new DateTime("2024-09-03"), // Fecha desde
    hasta: new DateTime("2024-11-11")  // Fecha hasta
);
$response = $client->BoletasHonorario->ListadoBHEEmitidasAsync($request)->wait();
if ($response->Status === 200) {
    echo "Listado de BHEs emitidas exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el data mapeado o crudo
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}