<?php

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\RejectionType;
use SDKSimpleFactura\Enum\ResponseType;
use SDKSimpleFactura\Models\Request\AcuseReciboExternoRequest;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
//Acuse Recibo
$request = new AcuseReciboExternoRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "76372100-0",
        nombreSucursal: 'Casa Matriz'
    ),
    dteReferenciadoExterno: new DteReferenciadoExterno(
        folio: 220,
        codigoTipoDte: DTEType::FacturaElectronica,
        ambiente: Ambiente::Certificacion
    ),
    respuesta: ResponseType::Rejected,
    tipoRechazo: RejectionType::RCD,
    comentario: "test"
);

$response = $client->Proveedores->acuseReciboAsync($request)->wait();
if ($response) {
    //print_r($response);
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";

    if ($response->Status === 200) {
        echo "Acuse.\n";
    } else {
        echo "Error ({$response->Status}): {$response->Message}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}