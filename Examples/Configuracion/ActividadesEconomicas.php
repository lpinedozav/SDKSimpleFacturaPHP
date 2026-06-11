<?php

// Obtener el listado de actividades económicas del SII

use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

$response = $client->Configuracion->ObtenerActividadesEconomicasAsync()->wait();

if ($response->Status === 200) {
    echo "Status: {$response->Status}\n";
    echo "Total actividades: " . count($response->Data) . "\n";
    foreach (array_slice($response->Data, 0, 5) as $act) {
        echo "  [{$act->codigo}] {$act->descripcion}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}
