<?php 
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\NuevoReceptorExternoRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
// Crear las credenciales
$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

// Crear la solicitud de productos
$clientes = new NuevoReceptorExternoRequest(
    rut: "57681892-0",
    razonSocial: "Cliente Test 1",
    giro: "Giro 1",
    dirPart: "direccion 1",
    dirFact: "direccion 1",
    correoPar: "correo 1",
    correoFact: "correo 1",
    ciudad: "Ciudad 1",
    comuna: "Comuna 1"
);

// Crear la solicitud principal
$request = new DatoExternoRequest(
    credenciales: $credenciales,
    clientes: [$clientes]
);

$response = $client->Clientes->AgregarClientesAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}