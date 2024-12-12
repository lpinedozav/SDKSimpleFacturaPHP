<?php

use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\FormaPago;
use SDKSimpleFactura\Enum\ReasonType;
use SDKSimpleFactura\Enum\TipoReferencia;
use SDKSimpleFactura\Models\Facturacion\Documento;
use SDKSimpleFactura\Models\Facturacion\Emisor;
use SDKSimpleFactura\Models\Facturacion\Encabezado;
use SDKSimpleFactura\Models\Facturacion\IdentificacionDTE;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\Models\Facturacion\CodigoItem;
use SDKSimpleFactura\Models\Facturacion\Detalle;
use SDKSimpleFactura\Models\Facturacion\Receptor;
use SDKSimpleFactura\Models\Facturacion\Referencia;
use SDKSimpleFactura\Models\Facturacion\Totales;
use SDKSimpleFactura\SimpleFacturaClient;
require_once 'vendor/autoload.php';
$client = new SimpleFacturaClient();

$request = new RequestDTE(
    Documento: new Documento(
        Encabezado: new Encabezado(
            IdDoc: new IdentificacionDTE(
                TipoDTE: DTEType::NotaCreditoElectronica,
                FchEmis: new DateTime(), // Fecha emisión
                FmaPago: FormaPago::Credito,
                FchVenc: (new DateTime())->modify('+6 months')
            ),
            Emisor: new Emisor(
                RUTEmisor: "76269769-6",
                RznSoc: "SERVICIOS INFORMATICOS CHILESYSTEMS EIRL",
                GiroEmis: "Desarrollo de software",
                Telefono: ["912345678"],
                CorreoEmisor: "felipe.anzola@erke.cl",
                Acteco: [620900],
                DirOrigen: "Chile",
                CmnaOrigen: "Chile",
                CiudadOrigen: "Chile"
            ),
            Receptor: new Receptor(
                RUTRecep: "77225200-5",
                RznSocRecep: "ARRENDADORA DE VEHÍCULOS S.A.",
                GiroRecep: "451001 - VENTA AL POR MAYOR DE VEHÍCULOS AUTOMOTORES",
                CorreoRecep: "terceros-77225200@dte.iconstruye.com",
                DirRecep: "Rondizzoni 2130",
                CmnaRecep: "SANTIAGO",
                CiudadRecep: "SANTIAGO"
            ),
            Totales: new Totales(
                MntNeto: 6930000.0,
                TasaIVA: 19,
                IVA: 1316700,
                MntTotal: 8246700.0
            )
        ),
        Detalle: [
            new Detalle(
                NroLinDet: 1,
                NmbItem: "CERRADURA DE SEGURIDAD (2PIEZA).SATURN EVO",
                CdgItem: [
                    new CodigoItem(
                        TpoCodigo: "4",
                        VlrCodigo: "EVO_2"
                    )
                ],
                QtyItem: 42.0,
                UnmdItem: "unid",
                PrcItem: 319166.0,
                MontoItem: 6930000
            )
        ],
        Referencia: [
            new Referencia(
                NroLinRef: 1,
                TpoDocRef: "61",
                FolioRef: "1268",
                FchRef: new DateTime("2024-10-17"),
                CodRef: TipoReferencia::AnulaDocumentoReferencia,
                RazonRef: "Anular"
            )
        ]
    )
);

// Definir la sucursal y motivo
$sucursal = "Casa Matriz";
$motivo = ReasonType::Otros;

// Act: Llamar al servicio
$response = $client->Facturacion->EmisionNC_NDV2Async($sucursal, $motivo, $request)->wait();

// Manejo de la respuesta
if ($response->Status === 200) {
    echo "Nota de Crédito emitida exitosamente.\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}