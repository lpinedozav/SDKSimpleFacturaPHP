<?php 
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
//Obtener PDF proveedor
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "76269769-6"
    ),
    ambiente: Ambiente::Certificacion,
    folio: 2232,
    codigoTipoDte: DTEType::FacturaElectronica
);
$response = $client->Proveedores->obtenerPDFAsync($request)->wait();

if ($response->Status === 200) {
    $xmlData = $response->Data;
    $ruta = 'Pdf.pdf';
    file_put_contents($ruta, $xmlData);

    echo "PDF guardado exitosamente en: $ruta \n";
} else {
    echo "Error ({$response->Status}): {$response->Message}";
}