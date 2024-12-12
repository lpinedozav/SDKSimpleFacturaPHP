<?php

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new Credenciales(
    rutEmisor: "76269769-6",
    nombreSucursal: "Casa Matriz"
);
$response = $client->Productos->listarProductosAsync($request)->wait();
if ($response) {
    // Imprimir la respuesta
    print_r($response);
    echo "Status: {$response->Status}\n";
    echo "Message: {$response->Message}\n";
    if ($response) {
        echo "\nDatos de la Respuesta:\n";
        echo "Status: {$response->Status}\n";
        echo "Message: {$response->Message}\n";

        if ($response->Status === 200) {
            echo "Productos listados exitosamente:\n";
            $contador = 0;
            foreach ($response->Data as $producto) {
                echo "------------------Productos-----------------\n";
                echo "ProductoId: {$producto->productoId}\n";
                echo "Nombre: {$producto->nombre}\n";
                echo "Precio: {$producto->precio}\n";
                echo "Exento: {$producto->exento}\n";
                $contador++;
                if ($contador >= 2) {
                    break;
                }
            }
        } else {
            echo "Error ({$response->Status}): {$response->Message}\n";
        }
    } else {
        echo "Error: No se pudo obtener una respuesta.\n";
    }
}