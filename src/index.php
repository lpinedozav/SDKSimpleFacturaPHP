<?php
// index.php
require_once 'vendor/autoload.php';

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\SimpleFacturaClient;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\ResponseType;
use SDKSimpleFactura\Enum\RejectionType;
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
use SDKSimpleFactura\Enum\TipoReferencia;
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
use SDKSimpleFactura\Models\Facturacion\Referencia;
use SDKSimpleFactura\Models\Facturacion\TipoBulto as FacturacionTipoBulto;
use SDKSimpleFactura\Models\Facturacion\Totales;
use SDKSimpleFactura\Models\Facturacion\Transporte;
use SDKSimpleFactura\Models\Request\RequestDTE;
use SDKSimpleFactura\Enum\ReasonType;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\Models\Request\DatoExternoRequest;
use SDKSimpleFactura\Models\Request\NuevoProductoExternoRequest;
use SDKSimpleFactura\Models\Request\EnvioMailRequest;
use SDKSimpleFactura\Models\Facturacion\MailClass;
use SDKSimpleFactura\Models\Facturacion\DteClass;
use SDKSimpleFactura\Models\Request\AcuseReciboExternoRequest;
use SDKSimpleFactura\Models\Request\BHERequest;
use SDKSimpleFactura\Models\Request\NuevoReceptorExternoRequest;
use SDKSimpleFactura\Models\Request\SolicitudFoliosRequest;
use SDKSimpleFactura\Models\Request\FolioRequest;
use SDKSimpleFactura\Models\Request\ListaBHERequest;

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
    echo "Status: {$response->Message}\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}



///Facturacion masiva
// Crear las credenciales
$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

// Ruta al archivo CSV
$pathCsv = "C:\\Users\\perea\\Downloads\\ejemplo_carga_masiva_nacional.csv";

$response = $client->Facturacion->facturacionMasiva($credenciales, $pathCsv)->wait();

if ($response->Status === 200) {
    echo "Facturación masiva exitosa.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` sin mapear
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}



// Crear la solicitud principal
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


//Listado DTE

$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "10422710-4",
        nombreSucursal: 'Casa Matriz'
    ),
    ambiente: Ambiente::Certificacion,
    folio: 0,
    codigoTipoDte: DTEType::NotSet,
    desde: new DateTime('2024-08-01'), // Fecha desde
    hasta: new DateTime('2024-08-17')  // Fecha hasta
);

// Llamar al servicio
$response = $client->Facturacion->ListadoDtesEmitidosAsync($request)->wait();

// Manejar la respuesta
if ($response->Status === 200) {
    echo "Listado de DTEs emitidos exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` mapeado o crudo
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}


//Envio Email

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



//Consolidado
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6'
    ),
    ambiente: Ambiente::Certificacion,
    desde: new DateTime("2023-10-25"), // Fecha desde
    hasta: new DateTime("2023-10-30")  // Fecha hasta
);

$response = $client->Facturacion->ConsolidadoVentasAsync($request)->wait();

// Manejar la respuesta
if ($response->Status === 200) {
    echo "Consolidado exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` mapeado o crudo
    print_r($response->Status); // Aquí se imprimirá el `data` mapeado o crudo

    foreach ($response->Data as $dte) {
        echo "-------------Consolidado----------------------\n";
        echo "Fecha: " . $dte->fecha->format('Y-m-d H:i:s') . "\n";
        echo "Tipo DTE: {$dte->tiposDTE}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

//Consolidar

// Crear las credenciales
$credenciales = new Credenciales(
    rutEmisor: '76269769-6'
);

$mes = 5;
$anio = 2024;

$response = $client->Facturacion->ConsolidadoEmitidosAsync($credenciales, $mes, $anio)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
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



///lISTAR
$request = new Credenciales(
    rutEmisor: "76269769-6",
    nombreSucursal: "Casa Matriz"
);
$response = $client->Productos->listarProductosAsync($request)->wait();
if ($response) {
    // Imprimir la respuesta
    print_r($response);
    echo "Status: {$response->Status}\n";
    echo "Message: {$response->Message}\n";
    if ($response) {
        echo "\nDatos de la Respuesta:\n";
        echo "Status: {$response->Status}\n";
        echo "Message: {$response->Message}\n";

        if ($response->Status === 200) {
            echo "Productos listados exitosamente:\n";
            $contador = 0;
            foreach ($response->Data as $producto) {
                echo "------------------Productos-----------------\n";
                echo "ProductoId: {$producto->productoId}\n";
                echo "Nombre: {$producto->nombre}\n";
                echo "Precio: {$producto->precio}\n";
                echo "Exento: {$producto->exento}\n";
                $contador++;
                if ($contador >= 2) {
                    break;
                }
            }
        } else {
            echo "Error ({$response->Status}): {$response->Message}\n";
        }
    } else {
        echo "Error: No se pudo obtener una respuesta.\n";
    }
}


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

$response = $client->Proovedores->acuseReciboAsync($request)->wait();
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

//Listado DTE Recibidos
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6'
    ),
    ambiente: Ambiente::Produccion,
    folio: null,
    codigoTipoDte: null,
    desde: new DateTime("2024-04-01"), // Fecha desde
    hasta: new DateTime("2024-04-30")  // Fecha hasta
);

$response = $client->Proovedores->listadoDtesRecibidosAsync($request)->wait();

// Manejar la respuesta
if ($response->Status === 200) {
    echo "Listado Recibidos exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el `data` mapeado o crudo
    print_r($response->Status); // Aquí se imprimirá el `data` mapeado o crudo

    foreach ($response->Data as $dte) {
        echo "-------------Listado Recibido----------------------\n";

        // Convertir la cadena a un objeto DateTime
        $fechaEmision = new DateTime($dte->fechaEmision);

        echo "fechaEmision: " . $fechaEmision->format('Y-m-d H:i:s') . "\n";
        echo "codigoSii: {$dte->codigoSii}\n";
        echo "ambiente: {$dte->ambiente}\n";
    }
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

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
$response = $client->Proovedores->obtenerXmlAsync($request)->wait();

if ($response->Status === 200) {
    $xmlData = $response->Data;
    $ruta = 'C:\Proyectos\SDKSimpleFactura\data\xmlproovedor.xml';
    file_put_contents($ruta, $xmlData);

    echo "XML guardado exitosamente en: $ruta \n";
} else {
    echo "Error ({$response->Status}): {$response->Message}";
}


//Obtener PDF proveedor
$request = new ListadoDteRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "76269769-6"
    ),
    ambiente: Ambiente::Certificacion,
    folio: 2232,
    codigoTipoDte: DTEType::FacturaElectronica
);
$response = $client->Proovedores->obtenerPDFAsync($request)->wait();

if ($response->Status === 200) {
    $xmlData = $response->Data;
    $ruta = 'Pdf.pdf';
    file_put_contents($ruta, $xmlData);

    echo "PDF guardado exitosamente en: $ruta \n";
} else {
    echo "Error ({$response->Status}): {$response->Message}";
}

//ConciliarRecibidos
///lISTAR
$request = new Credenciales(
    rutEmisor: "76269769-6",
);

$mes = 5;
$anio = 2024;

$response = $client->Proovedores->conciliarRecibidosAsync($credenciales, $mes, $anio)->wait();


if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

//ClientesService agregar

// Crear las credenciales
$credenciales = new Credenciales(
    rutEmisor: '76269769-6',
    nombreSucursal: 'Casa Matriz'
);

// Crear la solicitud de productos
$clientes = new NuevoReceptorExternoRequest(
    rut: "57681892-0",
    razonSocial: "Cliente Test 1",
    giro: "Giro 1",
    dirPart: "direccion 1",
    dirFact: "direccion 1",
    correoPar: "correo 1",
    correoFact: "correo 1",
    ciudad: "Ciudad 1",
    comuna: "Comuna 1"
);

// Crear la solicitud principal
$request = new DatoExternoRequest(
    credenciales: $credenciales,
    clientes: [$clientes]
);

$response = $client->Clientes->AgregarClientesAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}


//Listar clientes
$credenciales = new Credenciales(
    rutEmisor: '76269769-6'
);

$response = $client->Clientes->ListarClientesAsync($credenciales)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

//Listar sucural

$credenciales = new Credenciales(
    rutEmisor: '76269769-6'
);

$response = $client->Sucursal->ListadoSucursalesAsync($credenciales)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

//Consultar folios disponibles

$request = new SolicitudFoliosRequest(
    rutEmpresa: '76269769-6',
    tipoDTE: 33,
    ambiente: 0
);


$response = $client->Folio->ConsultaFoliosDisponiblesAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}


//solicitar folios

$request = new FolioRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        nombreSucursal: "Casa Matriz"
    ),
    cantidad: 1,
    codigoTipoDte: DTEType::FacturaElectronica
);


$response = $client->Folio->SolicitarFoliosAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}


//Consultar folios
$request = new FolioRequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        nombreSucursal: "Casa Matriz"
    ),
    ambiente: Ambiente::Certificacion,
    codigoTipoDte: null
);


$response = $client->Folio->ConsultarFoliosAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}


$request = new SolicitudFoliosRequest(
    rutEmpresa: '76269769-6',
    tipoDTE: 33,
    ambiente: 0
);


$response = $client->Folio->FoliosSinUsoAsync($request)->wait();

if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la Respuesta:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

$request = new Credenciales(
    rutEmisor: '76269769-6'
);

$response = $client->Configuracion->DatosEmpresaAsync($request)->wait();
if ($response->Status === 200) {
    echo 'Status: ' . $response->Status . "\n";
    echo "Message: {$response->Message}\n";
    echo "Datos de la empresa:\n";
    print_r($response->Data);
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

$request = new BHERequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        nombreSucursal: "Casa Matriz"
    ),
    folio: 15
);


$response = $client->BoletasHonorario->ObtenerPDFBHEEmitidaAsync($request)->wait();
if ($response->Status === 200) {
    $pdfData = $response->Data;
    file_put_contents('C:\Proyectos\SDKSimpleFactura\data\dte.pdf', $pdfData);
    echo "PDF guardado exitosamente.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}



$response = $client->BoletasHonorario->ObtenerPDFBHEEmitidaAsync($request)->wait();
if ($response->Status === 200) {
    $pdfData = $response->Data;
    file_put_contents('C:\Proyectos\SDKSimpleFactura\data\bhe.pdf', $pdfData);
    echo "PDF guardado exitosamente.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}

$request = new ListaBHERequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        nombreSucursal: "Casa Matriz"
    ),
    folio: null,
    desde: new DateTime("2024-09-03"), // Fecha desde
    hasta: new DateTime("2024-11-11")  // Fecha hasta
);
$response = $client->BoletasHonorario->ListadoBHEEmitidasAsync($request)->wait();
if ($response->Status === 200) {
    echo "Listado de BHEs emitidas exitoso.\n";
    print_r($response->Data); // Aquí se imprimirá el data mapeado o crudo
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
    print_r($response->Errors);
}

$request = new BHERequest(
    credenciales: new Credenciales(
        rutEmisor: '76269769-6',
        rutContribuyente: "26429782-6",
    ),
    folio: 2
);
$response = $client->BoletasHonorario->obtener($request)->wait();
if ($response->Status === 200) {
    $pdfData = $response->Data;
    file_put_contents('C:\Proyectos\SDKSimpleFactura\data\bhe2.pdf', $pdfData);
    echo "PDF guardado exitosamente.\n";
} else {
    echo "Error ({$response->Status}): {$response->Message}\n";
}