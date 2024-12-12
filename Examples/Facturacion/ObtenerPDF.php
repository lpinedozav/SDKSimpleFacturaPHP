<?php

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

// Crear una instancia de SolicitudDte con los datos necesarios
$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

$dteReferenciadoExterno = new DteReferenciadoExterno(
    folio: 4117, // folio
    codigoTipoDte: DTEType::FacturaElectronica,   // codigoTipoDte
    ambiente: Ambiente::Certificacion  // ambiente
);

$solicitud = new SolicitudDte(
    credenciales: $credenciales,
    dteReferenciadoExterno: $dteReferenciadoExterno
);

// Llamar al método obtenerPdfDteAsync
$response = $client->Facturacion->ObtenerPdfDteAsync($solicitud)->wait();

if ($response->Status === 200) {
    $pdfData = $response->Data;
    file_put_contents('data\dte.pdf', $pdfData);
    echo "PDF guardado exitosamente.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}