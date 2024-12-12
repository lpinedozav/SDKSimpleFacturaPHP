<?php

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

// Ruta al archivo CSV
$pathCsv = "data\ejemplo_carga_masiva_nacional.csv";

$response = $client->Facturacion->facturacionMasiva($credenciales, $pathCsv)->wait();

if ($response->Status === 200) {
    echo "Facturación masiva exitosa.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` sin mapear
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}