<?php
// index.php
require_once 'vendor/autoload.php';

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\ClausulaCompraVenta;
use SDKSimpleFactura\Enum\FormaPago;
use SDKSimpleFactura\Enum\IndicadorFacturacionExencion;
use SDKSimpleFactura\Enum\ModalidadVenta;
use SDKSimpleFactura\Enum\Moneda;
use SDKSimpleFactura\Enum\Paises;
use SDKSimpleFactura\Enum\Puertos;
use SDKSimpleFactura\Enum\TipoBulto;
use SDKSimpleFactura\Enum\TipoSobreEnvio;
use SDKSimpleFactura\Enum\UnidadMedida;
use SDKSimpleFactura\Enum\ViasDeTransporte;
use SDKSimpleFactura\Models\Facturacion\Aduana;
use SDKSimpleFactura\Models\Facturacion\CodigoItem;
use SDKSimpleFactura\Models\Facturacion\Detalle;
use SDKSimpleFactura\Models\Facturacion\DetalleExportacion;
use SDKSimpleFactura\Models\Facturacion\Documento;
use SDKSimpleFactura\Models\Facturacion\Emisor;
use SDKSimpleFactura\Models\Facturacion\Encabezado;
use SDKSimpleFactura\Models\Facturacion\Exportaciones;
use SDKSimpleFactura\Models\Facturacion\Extranjero;
use SDKSimpleFactura\Models\Facturacion\IdentificacionDTE;
use SDKSimpleFactura\Models\Facturacion\OtraMoneda;
use SDKSimpleFactura\Models\Facturacion\Receptor;
use SDKSimpleFactura\Models\Facturacion\TipoBulto as FacturacionTipoBulto;
use SDKSimpleFactura\Models\Facturacion\Totales;
use SDKSimpleFactura\Models\Facturacion\Transporte;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\NuevoProductoExternoRequest;

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
                    CodViaTransp: ViasDeTransporte::AEREO,
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
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}








//Productos
$name = bin2hex(random_bytes(3)); // Genera un string aleatorio de 6 caracteres

// Crear las credenciales
$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

// Crear la solicitud de productos
$producto = new NuevoProductoExternoRequest(
    nombre: $name,
    codigoBarra: $name,
    precio: 50.0,
    unidadMedida: 'un',
    exento: false,
    tieneImpuestos: false,
    impuestos: [0]
);

// Crear la solicitud principal
$request = new DatoExternoRequest(
    credenciales: $credenciales,
    productos: [$producto]
);

// Llamar al servicio

$response = $client->Productos->agregarProductosAsync($request)->wait();

if ($response) {
    //print_r($response);
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";

    if ($response->Status === 200) {
        echo "Producto agregado exitosamente.\n";
    } else {
        echo "Error ({$response->Status}): {$response->Message}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}
