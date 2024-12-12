<?php

use SDKSimpleFactura\Enum\ClausulaCompraVenta;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\FormaPago;
use SDKSimpleFactura\Enum\IndicadorFacturacionExencion;
use SDKSimpleFactura\Enum\ModalidadVenta;
use SDKSimpleFactura\Enum\Moneda;
use SDKSimpleFactura\Enum\Paises;
use SDKSimpleFactura\Enum\Puertos;
use SDKSimpleFactura\Enum\TipoBulto;
use SDKSimpleFactura\Enum\UnidadMedida;
use SDKSimpleFactura\Enum\ViasdeTransporte;
use SDKSimpleFactura\Models\Facturacion\Aduana;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\SimpleFacturaClient;

use SDKSimpleFactura\Models\Facturacion\CodigoItem;
use SDKSimpleFactura\Models\Facturacion\DetalleExportacion;
use SDKSimpleFactura\Models\Facturacion\Emisor;
use SDKSimpleFactura\Models\Facturacion\Encabezado;
use SDKSimpleFactura\Models\Facturacion\Exportaciones;
use SDKSimpleFactura\Models\Facturacion\Extranjero;
use SDKSimpleFactura\Models\Facturacion\IdentificacionDTE;
use SDKSimpleFactura\Models\Facturacion\OtraMoneda;
use SDKSimpleFactura\Models\Facturacion\Receptor;
use SDKSimpleFactura\Models\Facturacion\Totales;
use SDKSimpleFactura\Models\Facturacion\Transporte;
use SDKSimpleFactura\Models\Facturacion\TipoBulto as FacturacionTipoBulto;

require_once 'vendor/autoload.php';

$client = new SimpleFacturaClient();


$sucursalExportacion = "Casa Matriz";

$requestExp = new RequestDTE(
    Exportaciones: new Exportaciones(
        Encabezado: new Encabezado(
            IdDoc: new IdentificacionDTE(
                TipoDTE: DTEType::FacturaExportacionElectronica, // Tipo de documento
                FchEmis: new DateTime(), // Fecha emisión
                FmaPago: FormaPago::Contado, // Forma de pago
                FchVenc: (new DateTime())->modify('+5 months'), // Fecha vencimiento
            ),
            Emisor: new Emisor(
                RUTEmisor: "76269769-6",
                RznSoc: "Chilesystems",
                GiroEmis: "Desarrollo de software",
                Telefono: ["912345678"],
                CorreoEmisor: "mvega@chilesystems.com",
                Acteco: [620200],
                DirOrigen: "Calle 7 numero 3",
                CmnaOrigen: "Santiago",
                CiudadOrigen: "Santiago"
            ),
            Receptor: new Receptor(
                RUTRecep: "55555555-5",
                RznSocRecep: "CLIENTE INTERNACIONAL EXP IMP",
                Extranjero: new Extranjero(
                    NumId: "331-555555",
                    Nacionalidad: Paises::CHILE
                ),
                GiroRecep: "Giro de Cliente",
                CorreoRecep: "amamani@chilesystems.com",
                DirRecep: "Dirección de Cliente",
                CmnaRecep: "Comuna de Cliente",
                CiudadRecep: "Ciudad de Cliente"
            ),
            Transporte: new Transporte(
                Aduana: new Aduana(
                    CodModVenta: ModalidadVenta::A_FIRME,
                    CodClauVenta: ClausulaCompraVenta::FOB,
                    TotClauVenta: 1984.65,
                    CodViaTransp: ViasdeTransporte::AEREO,
                    CodPtoEmbarque: Puertos::COQUIMBO,
                    CodPtoDesemb: Puertos::BUENOS_AIRES,
                    Tara: 1,
                    CodUnidMedTara: UnidadMedida::U,
                    PesoBruto: 10.65,
                    CodUnidPesoBruto: UnidadMedida::KN,
                    PesoNeto: 9.56,
                    CodUnidPesoNeto: UnidadMedida::KN,
                    TotBultos: 30,
                    TipoBultos: [
                        new FacturacionTipoBulto(
                            CodTpoBultos: TipoBulto::CONTENEDOR_REFRIGERADO,
                            CantBultos: 30,
                            IdContainer: "1-2",
                            Sello: "1-3",
                            EmisorSello: "CONTENEDOR"
                        )
                    ],
                    MntFlete: 965.1,
                    MntSeguro: 10.25,
                    CodPaisRecep: Paises::ARGENTINA,
                    CodPaisDestin: Paises::ARGENTINA
                )
            ),
            Totales: new Totales(
                TpoMoneda: Moneda::DOLAR_ESTADOUNIDENSE,
                MntExe: 1000,
                MntTotal: 1000
            ),
            OtraMoneda: new OtraMoneda(
                TpoMoneda: Moneda::PESO_CHILENO,
                TpoCambio: 800.36,
                MntExeOtrMnda: 45454.36,
                MntTotOtrMnda: 45454.36
            )
        ),
        Detalle: [
            new DetalleExportacion(
                NroLinDet: 1,
                CdgItem: [
                    new CodigoItem(
                        TpoCodigo: "INT1",
                        VlrCodigo: "39"
                    )
                ],
                IndExe: IndicadorFacturacionExencion::NoAfectoOExento,
                NmbItem: "CHATARRA DE ALUMINIO",
                DscItem: "OPCIONAL",
                QtyItem: 1,
                UnmdItem: "U",
                PrcItem: 1000,
                MontoItem: 1000
            )
        ]
    ),
    Observaciones: "NOTA AL PIE DE PAGINA"
);
$response = $client->Facturacion->FacturacionIndividualV2ExportacionAsync($sucursalExportacion, $requestExp)->wait();

if ($response) {
    //print_r($response);
    echo "Status: {$response->Status}\n";
    echo "Status: {$response->Message}\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}