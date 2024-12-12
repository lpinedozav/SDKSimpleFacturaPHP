<?php

use SDKSimpleFactura\Models\Request\SolicitudFoliosRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new SolicitudFoliosRequest(
    rutEmpresa: '76269769-6',
    tipoDTE: 33,
    ambiente: 0
);


$response = $client->Folio->FoliosSinUsoAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}