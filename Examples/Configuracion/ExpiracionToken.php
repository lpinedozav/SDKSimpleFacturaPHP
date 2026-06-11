<?php

// Consultar el tiempo de expiración del token JWT (válido ~24h)

use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

$response = $client->Configuracion->TiempoExpiracionTokenAsync()->wait();

if ($response->Status === 200) {
    echo "Status: {$response->Status}\n";
    echo "El token expira en {$response->Data->expiresIn} segundos\n";
    echo "Fecha de expiración (UTC): {$response->Data->expiresAt}\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}
