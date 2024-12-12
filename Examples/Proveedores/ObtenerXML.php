<?php

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
//Obtener xml proveedor
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "96689310-9"
    ),
    ambiente: Ambiente::Produccion,
    folio: 7366834,
    codigoTipoDte: DTEType::NotaCreditoElectronica
);
$response = $client->Proveedores->obtenerXmlAsync($request)->wait();

if ($response->Status === 200) {
    $xmlData = $response->Data;
    $ruta = 'data\xmlproovedor.xml';
    file_put_contents($ruta, $xmlData);

    echo "XML guardado exitosamente en: $ruta \n";
} else {
    echo "Error ({$response->Status}): {$response->Message}";
}