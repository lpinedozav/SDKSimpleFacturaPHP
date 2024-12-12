<?php

use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new BHERequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "26429782-6",
    ),
    folio: 2
);
$response = $client->BoletasHonorario->ObtenerPDFBHERecibidosAsync($request)->wait();
if ($response->Status === 200) {
    $pdfData = $response->Data;
    file_put_contents('data\bhe2.pdf', $pdfData);
    echo "PDF guardado exitosamente.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}
