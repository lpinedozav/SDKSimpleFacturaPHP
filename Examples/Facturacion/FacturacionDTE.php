<?php

use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\FormaPago;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\SimpleFacturaClient;

use SDKSimpleFactura\Models\Facturacion\CodigoItem;
use SDKSimpleFactura\Models\Facturacion\Detalle;
use SDKSimpleFactura\Models\Facturacion\Documento;
use SDKSimpleFactura\Models\Facturacion\Emisor;
use SDKSimpleFactura\Models\Facturacion\Encabezado;
use SDKSimpleFactura\Models\Facturacion\IdentificacionDTE;
use SDKSimpleFactura\Models\Facturacion\Receptor;
use SDKSimpleFactura\Models\Facturacion\Totales;
require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();
$sucursal = "Casa_Matriz";

$request = new RequestDTE(
    Documento: new Documento(
        Encabezado: new Encabezado(
            IdDoc: new IdentificacionDTE(
                TipoDTE: DTEType::FacturaElectronica, // Tipo de documento
                FchEmis: new DateTime(), // Fecha emisión
                FmaPago: FormaPago::Contado, // Forma de pago
                FchVenc: (new DateTime())->modify('+6 months') // Fecha vencimiento
            ),
            Emisor: new Emisor(
                RUTEmisor: "76269769-6",
                RznSoc: "SERVICIOS INFORMATICOS CHILESYSTEMS EIRL",
                GiroEmis: "Desarrollo de software",
                Telefono: ["912345678"],
                CorreoEmisor: "mvega@chilesystems.com",
                Acteco: [620200],
                DirOrigen: "Calle 7 numero 3",
                CmnaOrigen: "Santiago",
                CiudadOrigen: "Santiago"
            ),
            Receptor: new Receptor(
                RUTRecep: "17096073-4",
                RznSocRecep: "Hotel Iquique",
                GiroRecep: "test",
                CorreoRecep: "mvega@chilesystems.com",
                DirRecep: "calle 12",
                CmnaRecep: "Paine",
                CiudadRecep: "Santiago"
            ),
            Totales: new Totales(
                MntNeto: 832,
                TasaIVA: 19,
                IVA: 158,
                MntTotal: 990
            )
        ),
        Detalle: [
            new Detalle(
                NroLinDet: 1,
                NmbItem: "Alfajor",
                CdgItem: [
                    new CodigoItem(
                        "ALFA",
                        "123"
                    )
                ],
                QtyItem: 1,
                UnmdItem: "un",
                PrcItem: 831.932773,
                MontoItem: 832
            )
        ]
    ),
    Observaciones: "NOTA AL PIE DE PAGINA",
    TipoPago: "30 dias"
);

$response = $client->Facturacion->FacturacionIndividualV2DTEAsync($sucursal, $request)->wait();

if ($response) {
    //print_r($response);
    echo "Status: {$response->Status}\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}