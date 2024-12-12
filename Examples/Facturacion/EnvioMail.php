<?php

use SDKSimpleFactura\Models\Facturacion\DteClass;
use SDKSimpleFactura\Models\Facturacion\MailClass;
use SDKSimpleFactura\Models\Request\EnvioMailRequest;
use SDKSimpleFactura\SimpleFacturaClient;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$request = new EnvioMailRequest(
    rutEmpresa: "76269769-6",
    dte: new DteClass(
        folio: 2149,
        tipoDte: 33
    ),
    mail: new MailClass(
        to: ["contacto@chilesystems.com"],
        ccos: ["correo@gmail.com"],
        ccs: ["correo2@gmail.com"]
    ),
    xml: true,
    pdf: true,
    comments: "ESTO ES UN COMENTARIO"
);

$response = $client->Facturacion->EnvioMailAsync($request)->wait();

// Manejar la respuesta
if ($response->Status === 200) {
    echo "Envio Email exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` mapeado o crudo
    print_r($response->Status); // Aquí se imprimirá el `data` mapeado o crudo
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}