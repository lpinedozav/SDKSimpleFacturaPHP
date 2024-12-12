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
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}