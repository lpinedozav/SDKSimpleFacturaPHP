<?php

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

//Listado DTE Recibidos
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6'
    ),
    ambiente: Ambiente::Produccion,
    folio: null,
    codigoTipoDte: null,
    desde: new DateTime("2024-04-01"), // Fecha desde
    hasta: new DateTime("2024-04-30")  // Fecha hasta
);

$response = $client->Proveedores->listadoDtesRecibidosAsync($request)->wait();

// Manejar la respuesta
if ($response->Status === 200) {
    echo "Listado Recibidos exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` mapeado o crudo
    print_r($response->Status); // Aquí se imprimirá el `data` mapeado o crudo

    foreach ($response->Data as $dte) {
        echo "-------------Listado Recibido----------------------\n";

        // Convertir la cadena a un objeto DateTime
        $fechaEmision = new DateTime($dte->fechaEmision);

        echo "fechaEmision: " . $fechaEmision->format('Y-m-d H:i:s') . "\n";
        echo "codigoSii: {$dte->codigoSii}\n";
        echo "ambiente: {$dte->ambiente}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}