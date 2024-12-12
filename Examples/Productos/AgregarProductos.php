<?php

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\NuevoProductoExternoRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$name = bin2hex(random_bytes(3)); // Genera un string aleatorio de 6 caracteres

// Crear las credenciales
$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

// Crear la solicitud de productos
$producto = new NuevoProductoExternoRequest(
    nombre: $name,
    codigoBarra: $name,
    precio: 50.0,
    unidadMedida: 'un',
    exento: false,
    tieneImpuestos: false,
    impuestos: [0]
);

// Crear la solicitud principal
$request = new DatoExternoRequest(
    credenciales: $credenciales,
    productos: [$producto]
);

// Llamar al servicio

$response = $client->Productos->agregarProductosAsync($request)->wait();

if ($response) {
    //print_r($response);
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";

    if ($response->Status === 200) {
        echo "Producto agregado exitosamente.\n";
    } else {
        echo "Error ({$response->Status}): {$response->Message}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}
