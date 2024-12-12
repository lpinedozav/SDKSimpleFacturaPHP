<?php

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new Credenciales(
    rutEmisor: '76269769-6'
);

$response = $client->Configuracion->DatosEmpresaAsync($request)->wait();
if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la empresa:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}