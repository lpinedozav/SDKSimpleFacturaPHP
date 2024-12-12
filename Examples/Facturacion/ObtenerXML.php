<?php

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

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

$response = $client->Facturacion->ObtenerXmlDteAsync($solicitud)->wait();

if ($response->Status === 200) {
    $xmlData = $response->Data;
    $ruta = 'data\xml.xml';
    file_put_contents($ruta, $xmlData);

    echo "XML guardado exitosamente en: $ruta \n";
} else {
    echo "Error ({$response->Status}): {$response->Message}";
}