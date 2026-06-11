<?php

// Listar transacciones de pago Payku en un rango de fechas

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\PaykuTransaccionesRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

$request = new PaykuTransaccionesRequest(
    Credenciales: new Credenciales(rutEmisor: '78181331-1'),
    Desde: new DateTime('2024-01-01'),
    Hasta: new DateTime('2024-12-31')
);

$response = $client->Payku->TransaccionesAsync($request)->wait();

if ($response->Status === 200) {
    echo "Status: {$response->Status}\n";
    echo "Message: {$response->Message}\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}
