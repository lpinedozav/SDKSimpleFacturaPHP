<?php

// Obtener el resumen de DTEs de un partner para un período

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\PartnerDteResumenRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

$request = new PartnerDteResumenRequest(
    Credenciales: new Credenciales(rutEmisor: '76269769-6'),
    Anio: 2024,
    Mes: 12
);

$response = $client->Partners->ObtenerResumenDtesAsync($request)->wait();

if ($response->Status === 200) {
    echo "Status: {$response->Status}\n";
    echo "Plan: {$response->Data->nombrePlan}\n";
    echo "DTEs: {$response->Data->dtes} (adicionales: {$response->Data->dtesAdicionales})\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}
