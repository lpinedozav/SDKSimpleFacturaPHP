<?php

// Emitir una Boleta de Honorarios Electrónica (BHE)

use SDKSimpleFactura\Enum\TipoRetencion;
use SDKSimpleFactura\Models\Request\BHEmitirRequest;
use SDKSimpleFactura\Models\Request\BheReceptor;
use SDKSimpleFactura\Models\Request\BheEmisor;
use SDKSimpleFactura\Models\Request\BheDetalle;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();

$request = new BHEmitirRequest(
    RutEmisor: '76269769-6',
    Correo: 'correo@ejemplo.cl',
    Retencion: TipoRetencion::Receptor,
    FechaEmision: date('Y-m-d'),
    Receptor: new BheReceptor(
        Rut: '77225200-5',
        Nombre: 'Cliente de Prueba',
        Direccion: 'Calle Falsa 123',
        Comuna: 'Santiago',
        Region: 13
    ),
    Emisor: new BheEmisor(Rut: '76269769-6'),
    Detalles: [
        new BheDetalle(Nombre: 'Asesoría profesional', Valor: 100000)
    ]
);

$response = $client->BoletasHonorario->EmitirBheAsync($request)->wait();

if ($response->Status === 200) {
    echo "Status: {$response->Status}\n";
    echo "Folio: {$response->Data->folio}\n";
    echo "Fecha emisión: {$response->Data->fechaEmision}\n";
    // $response->Data->pdfBase64 contiene el PDF en base64
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}
