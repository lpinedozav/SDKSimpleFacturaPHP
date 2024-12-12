<?php

use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\FolioRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new FolioRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        nombreSucursal: "Casa Matriz"
    ),
    cantidad: 1,
    codigoTipoDte: DTEType::FacturaElectronica
);


$response = $client->Folio->SolicitarFoliosAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}
