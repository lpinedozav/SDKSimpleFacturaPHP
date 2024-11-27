<?php
// index.php
require_once 'vendor/autoload.php';

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\TipoSobreEnvio;

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
    file_put_contents('C:\Proyectos\SDKSimpleFactura\data\dte.pdf', $pdfData);
    echo "PDF guardado exitosamente.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}



// Obtener timbre
$credenciales = new Credenciales(
    rutEmisor: '76269769-6'
);

$dteReferenciadoExterno = new DteReferenciadoExterno(
    folio: 2963,
    codigoTipoDte: DTEType::FacturaElectronica,
    ambiente: Ambiente::Certificacion
);

$solicitud = new SolicitudDte(
    credenciales: $credenciales,
    dteReferenciadoExterno: $dteReferenciadoExterno
);


$response = $client->Facturacion->ObtenerTimbreDteAsync($solicitud)->wait();

if ($response->Status === 200) {
    $timbreData = json_decode($response->Data, true);
    $timbreBase64 = $timbreData['data'];
    $decodedData = base64_decode($timbreBase64);
    file_put_contents('C:\Proyectos\SDKSimpleFactura\data\timbre.png', $decodedData);

    echo "Timbre guardado exitosamente en timbre.png.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}";
}


// Obtener Xml
$response = $client->Facturacion->ObtenerXmlDteAsync($solicitud)->wait();

if ($response->Status === 200) {
    $xmlData = $response->Data;
    $ruta = 'C:\Proyectos\SDKSimpleFactura\data\xml.xml';
    file_put_contents($ruta, $xmlData);

    echo "XML guardado exitosamente en: $ruta \n";
} else {
    echo "Error ({$response->Status}): {$response->Message}";
}

// Obtener DTE
$credenciales = new Credenciales(
    rutEmisor: '76269769-6'
);

$dteReferenciadoExterno = new DteReferenciadoExterno(
    folio: 12553,
    codigoTipoDte: DTEType::BoletaElectronica,
    ambiente: Ambiente::Certificacion
);

$solicitud = new SolicitudDte(
    credenciales: $credenciales,
    dteReferenciadoExterno: $dteReferenciadoExterno
);

$response = $client->Facturacion->ObtenerDteAsync($solicitud)->wait();

if ($response) {
    //$dteData = $response->Data['data'];
    echo "Status: {$response->Status}\n";
    echo "Message: {$response->Message}\n";
    print_r($response);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}


//Obtener sobre XML
$tipoSobre = TipoSobreEnvio::AlSII;
$response = $client->Facturacion->ObtenerSobreXmlDteAsync($solicitud, $tipoSobre)->wait();

if ($response->Status === 200) {
    // Guardar el archivo XML como un sobre
    $ruta = 'C:\Proyectos\SDKSimpleFactura\data\sobre.xml';
    file_put_contents($ruta, $response->Data);

    echo "Sobre XML guardado exitosamente en: $ruta\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}
