<?php

use PHPUnit\Framework\TestCase;
use SDKSimpleFactura\SimpleFacturaClient;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\SolicitudDte;
use SDKSimpleFactura\Models\Request\DteReferenciadoExterno;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\TipoSobreEnvio;
use SDKSimpleFactura\Enum\FormaPago;
use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Models\Facturacion\Documento;
use SDKSimpleFactura\Models\Facturacion\Encabezado;
use SDKSimpleFactura\Models\Facturacion\IdentificacionDTE;
use SDKSimpleFactura\Models\Request\RequestDTE;
use DateTime;
use SDKSimpleFactura\DependencyInjectionConfig;
use SDKSimpleFactura\Enum\ClausulaCompraVenta;
use SDKSimpleFactura\Enum\IndicadorFacturacionExencion;
use SDKSimpleFactura\Enum\ModalidadVenta;
use SDKSimpleFactura\Enum\Moneda;
use SDKSimpleFactura\Enum\Paises;
use SDKSimpleFactura\Enum\Puertos;
use SDKSimpleFactura\Enum\ReasonType;
use SDKSimpleFactura\Enum\UnidadMedida;
use SDKSimpleFactura\Enum\ViasDeTransporte;
use SDKSimpleFactura\Interfaces\IFolioService;
use SDKSimpleFactura\Models\Facturacion\Aduana;
use SDKSimpleFactura\Models\Facturacion\CodigoItem;
use SDKSimpleFactura\Models\Facturacion\Detalle;
use SDKSimpleFactura\Models\Facturacion\Emisor;
use SDKSimpleFactura\Models\Facturacion\Exportaciones;
use SDKSimpleFactura\Models\Facturacion\Extranjero;
use SDKSimpleFactura\Models\Facturacion\Receptor;
use SDKSimpleFactura\Enum\TipoBulto as TipoBultoEnum;
use SDKSimpleFactura\Enum\TipoReferencia;
use SDKSimpleFactura\Models\Facturacion\DetalleExportacion;
use SDKSimpleFactura\Models\Facturacion\DteClass;
use SDKSimpleFactura\Models\Facturacion\MailClass;
use SDKSimpleFactura\Models\Facturacion\OtraMoneda;
use SDKSimpleFactura\Models\Facturacion\Referencia;
use SDKSimpleFactura\Models\Facturacion\TipoBulto;
use SDKSimpleFactura\Models\Facturacion\Totales;
use SDKSimpleFactura\Models\Facturacion\Transporte;
use SDKSimpleFactura\Models\Request\EnvioMailRequest;
use SDKSimpleFactura\Models\Request\FolioRequest;
use SDKSimpleFactura\Models\Request\ListadoDteRequest;
use SDKSimpleFactura\Models\Response\InvoiceData;


class FacturacionServiceTest extends TestCase
{
    private ?SimpleFacturaClient $simpleFacturaClient;
    private IFolioService $_folioService;
    private ?IFacturacionService $facturacionService;

    protected function setUp(): void
    {

        $container = DependencyInjectionConfig::configureServices();

        // Crear una instancia de SimpleFacturaClient usando el contenedor
        $this->simpleFacturaClient = new SimpleFacturaClient($container);
        $this->facturacionService = $this->simpleFacturaClient->Facturacion;
        $this->_folioService = $this->simpleFacturaClient->Folio;
    }

    public function testObtenerPdfDteAsync_ReturnsOkResult_WhenPDFIsGeneratedSuccessfully()
    {
        // Arrange: Crear la solicitud PDF
        $solicitudPDF = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: 'Casa Matriz'
            ),
            new DteReferenciadoExterno(
                folio: 4117,
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el PDF
        $result = $this->facturacionService->ObtenerPdfDteAsync($solicitudPDF)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $result->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($result->Data, 'Los datos del PDF no deben ser nulos.');
        $this->assertIsString($result->Data, 'Los datos deben ser una cadena (contenido del PDF en bytes).');

    }

    public function testObtenerPdfDteAsync_ReturnsServerError_WhenInvalidDataIsProvided()
    {
        // Arrange: Crear la solicitud PDF con datos inválidos
        $solicitudPDF = new SolicitudDte(
            new Credenciales(
                rutEmisor: '', // Rut Emisor vacío (inválido)
                nombreSucursal: 'Casa Matriz'
            ),
            new DteReferenciadoExterno(
                folio: 0, // Folio inválido (debe ser mayor a 0)
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el PDF
        $result = $this->facturacionService->ObtenerPdfDteAsync($solicitudPDF)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(500, $result->Status, 'El estado de la respuesta debe ser 500.');
        $this->assertNull($result->Data, 'Los datos del PDF deben ser nulos en caso de error.');
        $this->assertNotNull($result->Errors, 'Los errores deben contener información sobre el problema.');
        $this->assertIsArray($result->Errors, 'Los errores deben ser un arreglo.');
    }

    public function testObtenerTimbreDteAsync_ReturnsOkResult_WhenTimbreIsGeneratedSuccessfully()
    {
        // Arrange: Crear la solicitud para obtener el timbre
        $solicitudTimbre = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6'
            ),
            new DteReferenciadoExterno(
                folio: 4117,
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el timbre
        $response = $this->facturacionService->ObtenerTimbreDteAsync($solicitudTimbre)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos del timbre no deben ser nulos.');
    }

    public function testObtenerTimbreDteAsync_ReturnsInternalServerError_WhenServerFails()
    {
        // Arrange: Crear la solicitud para obtener el timbre con datos válidos
        $solicitudTimbre = new SolicitudDte(
            new Credenciales(
                rutEmisor: ''
            ),
            new DteReferenciadoExterno(
                folio: 4117,
                codigoTipoDte: DTEType::FacturaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        // Act: Llamar al servicio para obtener el timbre
        $response = $this->facturacionService->ObtenerTimbreDteAsync($solicitudTimbre)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(500, $response->Status, 'El estado de la respuesta debe ser 500 (Internal Server Error).');
        $this->assertEquals("Error al obtener xml desde api", $response->Data);
        $this->assertNotNull($response->Message, 'El mensaje de error no debe ser nulo.');
       
    }

    public function testObtenerXmlDteAsync_ReturnsOkResult_WhenXmlDteIsSentSuccessfully()
    {
        // Arrange: Crear la solicitud para obtener el XML del DTE
        $solicitudXml = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6'
            ),
            new DteReferenciadoExterno(
                folio: 12553,
                codigoTipoDte: DTEType::BoletaElectronica, // Código tipo 39
                ambiente: Ambiente::Certificacion // Ambiente de certificación
            )
        );

        // Act: Llamar al servicio para obtener el XML del DTE
        $response = $this->facturacionService->ObtenerXmlDteAsync($solicitudXml)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos del XML no deben ser nulos.');
        $this->assertIsString($response->Data, 'El XML debe ser una cadena (contenido en formato base64).');
    }


    public function testObtenerXmlDteAsync_ReturnsInternalServerError_WhenServerFails()
    {
        // Arrange: Crear la solicitud con datos válidos
        $solicitudXml = new SolicitudDte(
            new Credenciales(
                rutEmisor: ''
            ),
            new DteReferenciadoExterno(
                folio: 12553,
                codigoTipoDte: DTEType::BoletaElectronica, // Código tipo 39
                ambiente: Ambiente::Certificacion // Ambiente de certificación
            )
        );

        // Act: Llamar al servicio para obtener el XML del DTE
        $response = $this->facturacionService->ObtenerXmlDteAsync($solicitudXml)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(500, $response->Status, 'El estado de la respuesta debe ser 500 (Internal Server Error).');
        $this->assertEquals("Error al obtener xml desde api", $response->Data);
        $this->assertNotNull($response->Message, 'El mensaje de error no debe ser nulo.');
        $this->assertNotNull($response->Errors, 'Los errores deben ser nulos en caso de error interno.');
    }

    public function testObtenerSobreXmlDteAsync_ReturnsOkResult_WhenXmlSobreIsGeneratedSuccessfully()
    {
        // Arrange: Crear la solicitud para obtener el sobre XML
        $solicitudXmlSobre = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6'
            ),
            new DteReferenciadoExterno(
                folio: 2393,
                codigoTipoDte: DTEType::FacturaElectronica, // Código tipo 33
                ambiente: Ambiente::Certificacion // Ambiente de certificación
            )
        );

        // Act: Llamar al servicio para obtener el sobre XML
        $response = $this->facturacionService->ObtenerSobreXmlDteAsync($solicitudXmlSobre, TipoSobreEnvio::AlSII)->wait();

        // Assert: Validar los resultados
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos del sobre XML no deben ser nulos.');
        $this->assertIsString($response->Data, 'Los datos deben ser una cadena (contenido en formato base64).');
    }

    public function testObtenerSobreXmlDteAsync_ReturnsError_WhenApiReturnsFailure()
    {
        $solicitudXmlSobre = new SolicitudDte(
            new Credenciales(
                rutEmisor: ''
            ),
            new DteReferenciadoExterno(
                codigoTipoDte: DTEType::FacturaElectronica, 
                ambiente: Ambiente::Certificacion 
           
            )
        );


        $response = $this->facturacionService->ObtenerSobreXmlDteAsync($solicitudXmlSobre, TipoSobreEnvio::AlReceptor)->wait();


        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(500, $response->Status, 'El estado de la respuesta debe ser 500 (Internal Server Error).');
        $this->assertEquals("Error al obtener sobre xml desde api", $response->Data);
        $this->assertNotNull($response->Message, 'El mensaje de error no debe ser nulo.');
        $this->assertNotNull($response->Errors, 'Los errores deben ser nulos en caso de error interno.');
    }

    public function testObtenerDteAsync_ReturnsOkResult_WhenDteIsRetrievedSuccessfully()
    {
        $solicitudDte = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: 'Casa Matriz'
            ),
            new DteReferenciadoExterno(
                folio: 12553,
                codigoTipoDte: DTEType::BoletaElectronica,
                ambiente: Ambiente::Certificacion 
            )
        );


        $response = $this->facturacionService->ObtenerDteAsync($solicitudDte)->wait();

        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertEquals('DTE encontrado', $response->Message, 'El mensaje debe indicar que el DTE fue encontrado.');
        $this->assertNotNull($response->Data, 'Los datos del DTE no deben ser nulos.');

        $this->assertEquals(12553, $response->Data->folio, 'El folio debe ser 12553.');
        $this->assertEquals('Certificación', $response->Data->ambiente, 'El ambiente debe ser "Certificación".');
        $this->assertEquals('Cliente en Marketplace', $response->Data->razonSocialReceptor, 'La razón social debe ser "Cliente en Marketplace".');
        $this->assertEquals('66666666-6', $response->Data->rutReceptor, 'El RUT del receptor debe ser "66666666-6".');
        $this->assertEquals(990, $response->Data->total, 'El total debe ser 990.');

        $this->assertCount(1, $response->Data->detalles, 'Debe haber un solo detalle en el documento.');
    }

    public function testObtenerDteAsync_ReturnsBadRequest_WhenApiReturnsFailure()
    {
        $request = new SolicitudDte(
            new Credenciales(
                rutEmisor: '76269769-2',
                nombreSucursal: 'Casa Matriz'
            ),
            new DteReferenciadoExterno(
                folio: 12553,
                codigoTipoDte: DTEType::BoletaElectronica,
                ambiente: Ambiente::Certificacion
            )
        );

        $response = $this->facturacionService->ObtenerDteAsync($request)->wait();

        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(400, $response->Status, 'El estado de la respuesta debe ser 400.');
        $this->assertEquals("Error interno", $response->Message, 'El mensaje debe indicar que el DTE no fue encontrado.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
        $this->assertContains('Rut de emisor 76269769-2 no valido', $response->Errors, 'Los errores deben contener el mensaje "Rut de emisor 76269769-2 no valido".');
    }

    public function testFacturacionIndividualV2DTEAsync_ReturnsOkResult_WhenInvoiceIsGeneratedSuccessfully()
    {
        $sucursal = "Casa_Matriz";
    
        $request = new RequestDTE(
            Documento: new Documento(
                Encabezado: new Encabezado(
                    IdDoc: new IdentificacionDTE(
                        TipoDTE: DTEType::FacturaElectronica,
                        FchEmis: new DateTime(),
                        FmaPago: FormaPago::Credito, // Código equivalente a "1"
                        FchVenc: (new DateTime())->modify('+6 months')
                    ),
                    Emisor: new Emisor(
                        RUTEmisor: '76269769-6',
                        RznSoc: 'SERVICIOS INFORMATICOS CHILESYSTEMS EIRL',
                        GiroEmis: 'Desarrollo de software',
                        Telefono: ['912345678'],
                        CorreoEmisor: 'mvega@chilesystems.com',
                        Acteco: [620200],
                        DirOrigen: 'Calle 7 numero 3',
                        CmnaOrigen: 'Santiago',
                        CiudadOrigen: 'Santiago'
                    ),
                    Receptor: new Receptor(
                        RUTRecep: '17096073-4',
                        RznSocRecep: 'Hotel Iquique',
                        GiroRecep: 'test',
                        CorreoRecep: 'mvega@chilesystems.com',
                        DirRecep: 'calle 12',
                        CmnaRecep: 'Paine',
                        CiudadRecep: 'Santiago'
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
                        NmbItem: 'Alfajor',
                        CdgItem: [
                            new CodigoItem(
                                TpoCodigo: 'ALFA',
                                VlrCodigo: '123'
                            )
                        ],
                        QtyItem: 1,
                        UnmdItem: 'un',
                        PrcItem: 831.932773,
                        MontoItem: 832
                    )
                ]
            ),
            Observaciones: 'NOTA AL PIE DE PAGINA',
            TipoPago: '30 dias'
        );
    
        $response = $this->facturacionService->FacturacionIndividualV2DTEAsync($sucursal, $request)->wait();
    
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->Status);
        $this->assertInstanceOf(InvoiceData::class, $response->Data);
        $this->assertEquals('76269769-6', $response->Data->rutEmisor);
        $this->assertEquals('17096073-4', $response->Data->rutReceptor);
        $this->assertNotNull($response->Message);
    }
    public function testFacturacionIndividualV2DTEAsync_ReturnsBadRequest_WhenTipoDTEIsNotFound()
    {
        $sucursal = "Casa_Matriz";
    
        $request = new RequestDTE(
            Documento: new Documento(
                Encabezado: new Encabezado(
                    IdDoc: new IdentificacionDTE(
                        //TipoDTE: DTEType::FacturaElectronica,
                        FchEmis: new DateTime(),
                        FmaPago: FormaPago::Credito, // Código equivalente a "1"
                        FchVenc: (new DateTime())->modify('+6 months')
                    ),
                    Emisor: new Emisor(
                        RUTEmisor: '76269769-6',
                        RznSoc: 'SERVICIOS INFORMATICOS CHILESYSTEMS EIRL',
                        GiroEmis: 'Desarrollo de software',
                        Telefono: ['912345678'],
                        CorreoEmisor: 'mvega@chilesystems.com',
                        Acteco: [620200],
                        DirOrigen: 'Calle 7 numero 3',
                        CmnaOrigen: 'Santiago',
                        CiudadOrigen: 'Santiago'
                    ),
                    Receptor: new Receptor(
                        RUTRecep: '17096073-4',
                        RznSocRecep: 'Hotel Iquique',
                        GiroRecep: 'test',
                        CorreoRecep: 'mvega@chilesystems.com',
                        DirRecep: 'calle 12',
                        CmnaRecep: 'Paine',
                        CiudadRecep: 'Santiago'
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
                        NmbItem: 'Alfajor',
                        CdgItem: [
                            new CodigoItem(
                                TpoCodigo: 'ALFA',
                                VlrCodigo: '123'
                            )
                        ],
                        QtyItem: 1,
                        UnmdItem: 'un',
                        PrcItem: 831.932773,
                        MontoItem: 832
                    )
                ]
            ),
            Observaciones: 'NOTA AL PIE DE PAGINA',
            TipoPago: '30 dias'
        );
    
        $response = $this->facturacionService->FacturacionIndividualV2DTEAsync($sucursal, $request)->wait();
    
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(400, $response->Status, 'El estado de la respuesta debe ser 400.');
        $this->assertFalse($response->Data);
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
        $this->assertCount(1, $response->Errors, 'Debe haber exactamente un error.');
        $this->assertEquals("Error al facturar desde api", $response->Message, 'El mensaje debe ser "Error al facturar desde api".');
        $this->assertContains("Tipo dte vacio", $response->Errors, 'Los errores deben contener "Tipo dte vacio".');
    }
    

    public function testFacturacionIndividualV2ExportacionAsync_ReturnsOkResult_WhenInvoiceIsGeneratedSuccessfully()
    {
        $maxIntentos = 3;
        $intentoActual = 0;
        $exito = false;

        $ultimaExcepcion = null;

        while ($intentoActual < $maxIntentos && !$exito) {
            $intentoActual++;

            try {
                // Arrange: Solicitar folio
                [$success, $folio] = $this->solicitarFolio(DTEType::FacturaExportacionElectronica, 1);

                if ($success) {
                    $exportacion = new RequestDTE(
                        Exportaciones: new Exportaciones(
                            Encabezado: new Encabezado(
                                IdDoc: new IdentificacionDTE(
                                    TipoDTE: DTEType::FacturaExportacionElectronica,
                                    FchEmis: new DateTime(),
                                    FmaPago: FormaPago::Credito,
                                    FchVenc: (new DateTime())->modify('+5 months'),
                                    Folio: $folio
                                ),
                                Emisor: new Emisor(
                                    RUTEmisor:'76269769-6',
                                    RznSoc: 'Chilesystems',
                                    GiroEmis: 'Desarrollo de software',
                                    Telefono: ['912345678'],
                                    CorreoEmisor: 'mvega@chilesystems.com',
                                    Acteco: [620200],
                                    DirOrigen: 'Calle 7 numero 3',
                                    CmnaOrigen: 'Santiago',
                                    CiudadOrigen: 'Santiago'
                                ),
                                Receptor: new Receptor(
                                    RUTRecep: '55555555-5',
                                    RznSocRecep: 'CLIENTE INTERNACIONAL EXP IMP',
                                    Extranjero: new Extranjero(
                                        NumId: '331-555555',
                                        Nacionalidad: Paises::CHILE
                                    ),
                                    GiroRecep: 'Giro de Cliente',
                                    CorreoRecep: 'amamani@chilesystems.com',
                                    DirRecep: 'Dirección de Cliente',
                                    CmnaRecep: 'Comuna de Cliente',
                                    CiudadRecep: 'Ciudad de Cliente'
                                ),
                                Transporte: new Transporte(
                                    Aduana: new Aduana(
                                        CodModVenta: ModalidadVenta::A_FIRME,
                                        CodClauVenta: ClausulaCompraVenta::CIF,
                                        TotClauVenta: 1984.65,
                                        CodViaTransp: ViasDeTransporte::AEREO,
                                        CodPtoEmbarque: Puertos::ARICA,
                                        CodPtoDesemb: Puertos::BUENOS_AIRES,
                                        Tara: 1,
                                        CodUnidMedTara: UnidadMedida::U ,
                                        PesoBruto: 10.65,
                                        CodUnidPesoBruto: UnidadMedida::KN,
                                        PesoNeto: 9.56,
                                        CodUnidPesoNeto: UnidadMedida::KN,
                                        TotBultos: 30,
                                        TipoBultos: [
                                            new TipoBulto(
                                                CodTpoBultos: TipoBultoEnum::CONTENEDOR_REFRIGERADO,
                                                CantBultos: 30,
                                                IdContainer: '1-2',
                                                Sello: '1-3',
                                                EmisorSello: 'CONTENEDOR'
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
                                            TpoCodigo: 'INT1',
                                            VlrCodigo: '39'
                                        )
                                    ],
                                    IndExe: IndicadorFacturacionExencion::NoAfectoOExento,
                                    NmbItem: 'CHATARRA DE ALUMINIO',
                                    DscItem: 'OPCIONAL',
                                    QtyItem: 1,
                                    UnmdItem: 'U',
                                    PrcItem: 1000,
                                    MontoItem: 1000
                                )
                            ]
                        ),
                        Observaciones: 'NOTA AL PIE DE PAGINA'
                    );

                    $sucursalExportacion = 'Casa Matriz';

                    // Act: Generar la exportación
                    $result = $this->facturacionService->FacturacionIndividualV2ExportacionAsync($sucursalExportacion, $exportacion)->wait();

                    // Assert: Validar el resultado
                    $this->assertNotNull($result);
                    $this->assertEquals(200, $result->Status);
                    $this->assertInstanceOf(InvoiceData::class, $result->Data);
                    $this->assertEquals('76269769-6', $result->Data->rutEmisor);
                    $this->assertEquals('55555555-5', $result->Data->rutReceptor);
                    $this->assertNotNull($result->Message);

                    $exito = true;
                } else {
                    throw new \Exception('Error: Sin folios');
                }
            } catch (\Exception $ex) {
                $ultimaExcepcion = $ex;
                if ($intentoActual < $maxIntentos) {
                    sleep(1);
                }
            }
        }

        if (!$exito) {
            $this->fail("La prueba falló después de $maxIntentos intentos. Último error: {$ultimaExcepcion->getMessage()}");
        }
    }

    public function testFacturacionIndividualV2ExportacionAsync_ReturnsError_WhenRutEmisorIsNotFound()
    {
        $exportacion = new RequestDTE(
            Exportaciones: new Exportaciones(
                Encabezado: new Encabezado(
                    IdDoc: new IdentificacionDTE(
                        TipoDTE: DTEType::FacturaExportacionElectronica,
                        FchEmis: new DateTime(),
                        FmaPago: FormaPago::Credito,
                        FchVenc: (new DateTime())->modify('+5 months')
                    ),
                    Emisor: new Emisor(
                        //RUTEmisor:'76269769-6',
                        RznSoc: 'Chilesystems',
                        GiroEmis: 'Desarrollo de software',
                        Telefono: ['912345678'],
                        CorreoEmisor: 'mvega@chilesystems.com',
                        Acteco: [620200],
                        DirOrigen: 'Calle 7 numero 3',
                        CmnaOrigen: 'Santiago',
                        CiudadOrigen: 'Santiago'
                    ),
                    Receptor: new Receptor(
                        RUTRecep: '55555555-5',
                        RznSocRecep: 'CLIENTE INTERNACIONAL EXP IMP',
                        Extranjero: new Extranjero(
                            NumId: '331-555555',
                            Nacionalidad: Paises::CHILE
                        ),
                        GiroRecep: 'Giro de Cliente',
                        CorreoRecep: 'amamani@chilesystems.com',
                        DirRecep: 'Dirección de Cliente',
                        CmnaRecep: 'Comuna de Cliente',
                        CiudadRecep: 'Ciudad de Cliente'
                    ),
                    Transporte: new Transporte(
                        Aduana: new Aduana(
                            CodModVenta: ModalidadVenta::A_FIRME,
                            CodClauVenta: ClausulaCompraVenta::CIF,
                            TotClauVenta: 1984.65,
                            CodViaTransp: ViasDeTransporte::AEREO,
                            CodPtoEmbarque: Puertos::ARICA,
                            CodPtoDesemb: Puertos::BUENOS_AIRES,
                            Tara: 1,
                            CodUnidMedTara: UnidadMedida::U ,
                            PesoBruto: 10.65,
                            CodUnidPesoBruto: UnidadMedida::KN,
                            PesoNeto: 9.56,
                            CodUnidPesoNeto: UnidadMedida::KN,
                            TotBultos: 30,
                            TipoBultos: [
                                new TipoBulto(
                                    CodTpoBultos: TipoBultoEnum::CONTENEDOR_REFRIGERADO,
                                    CantBultos: 30,
                                    IdContainer: '1-2',
                                    Sello: '1-3',
                                    EmisorSello: 'CONTENEDOR'
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
                                TpoCodigo: 'INT1',
                                VlrCodigo: '39'
                            )
                        ],
                        IndExe: IndicadorFacturacionExencion::NoAfectoOExento,
                        NmbItem: 'CHATARRA DE ALUMINIO',
                        DscItem: 'OPCIONAL',
                        QtyItem: 1,
                        UnmdItem: 'U',
                        PrcItem: 1000,
                        MontoItem: 1000
                    )
                ]
            ),
            Observaciones: 'NOTA AL PIE DE PAGINA'
        );

        $sucursalExportacion = 'Casa Matriz';

        // Act: Generar la exportación
        $result = $this->facturacionService->FacturacionIndividualV2ExportacionAsync($sucursalExportacion, $exportacion)->wait();

        // Assert: Validar el resultado
        $this->assertNotNull($result);
        $this->assertEquals(500, $result->Status);
        $this->assertNotNull($result->Data);
        $this->assertNotNull($result->Errors);
        $this->assertCount(1, $result->Errors, 'Debe haber exactamente un error.');
        $this->assertEquals("Error al facturar desde api",$result->Message);
    }

    public function testFacturacionMasiva_ReturnsOkResult_WhenCsvIsProcessedSuccessfully()
    {
        // Arrange
        $credenciales = new Credenciales(
            rutEmisor: '76269769-6',
            nombreSucursal: 'Casa Matriz'
        );

        // Ruta al archivo CSV
        $pathCsv = "data\\ejemplo_carga_masiva_nacional.csv";

        // Act
        $response = $this->facturacionService->facturacionMasiva($credenciales, $pathCsv)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
        echo "Facturación masiva exitosa.\n";
        print_r($response->Data); // Aquí se imprimirá el `data` sin mapear
    }

    public function testFacturacionMasiva_ReturnsError_WhenCsvProcessingFails()
    {
        // Arrange
        $credenciales = new Credenciales(
            rutEmisor: '76269769-6',
            nombreSucursal: 'Casa Matriz'
        );

        // Ruta al archivo CSV incorrecta o con datos inválidos
        $pathCsv = "data\\archivo_invalido.csv";

        // Act
        $response = $this->facturacionService->facturacionMasiva($credenciales, $pathCsv)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
        echo "Error ({$response->Status}): {$response->Message}\n";
        print_r($response->Errors);
    }

    //corregir
    public function testEmisionNC_NDV2Async_ReturnsOkResult_WhenApiCallIsSuccessful()
    {
        $maxIntentos = 3;
        $intentoActual = 0;
        $exito = false;

        $ultimaExcepcion = null;

        while ($intentoActual < $maxIntentos && !$exito) {
            $intentoActual++;

            try {
                // Arrange: Solicitar folio
                [$success, $folio] = $this->solicitarFolio(DTEType::NotaCreditoElectronica, 1);

                if ($success) {
                    $request = new RequestDTE(
                        Documento: new Documento(
                            Encabezado: new Encabezado(
                                IdDoc: new IdentificacionDTE(
                                    TipoDTE: DTEType::NotaCreditoElectronica,
                                    FchEmis: new DateTime(),
                                    FmaPago: FormaPago::Credito,
                                    FchVenc: (new DateTime())->modify('+6 months'),
                                    Folio: $folio
                                ),
                                Emisor: new Emisor(
                                    RUTEmisor: '76269769-6',
                                    RznSoc: 'SERVICIOS INFORMATICOS CHILESYSTEMS EIRL',
                                    GiroEmis: 'Desarrollo de software',
                                    Telefono: ['912345678'],
                                    CorreoEmisor: 'felipe.anzola@erke.cl',
                                    Acteco: [620900],
                                    DirOrigen: 'Chile',
                                    CmnaOrigen: 'Chile',
                                    CiudadOrigen: 'Chile'
                                ),
                                Receptor: new Receptor(
                                    RUTRecep: '77225200-5',
                                    RznSocRecep: 'ARRENDADORA DE VEHÍCULOS S.A.',
                                    GiroRecep: '451001 - VENTA AL POR MAYOR DE VEHÍCULOS AUTOMOTORES',
                                    CorreoRecep: 'terceros-77225200@dte.iconstruye.com',
                                    DirRecep: 'Rondizzoni 2130',
                                    CmnaRecep: 'SANTIAGO',
                                    CiudadRecep: 'SANTIAGO'
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
                                    NmbItem: 'CERRADURA DE SEGURIDAD (2PIEZA).SATURN EVO',
                                    CdgItem: [
                                        new CodigoItem(
                                            TpoCodigo: '4',
                                            VlrCodigo: 'EVO_2'
                                        )
                                    ],
                                    QtyItem: 42.0,
                                    UnmdItem: 'unid',
                                    PrcItem: 319166.0,
                                    MontoItem: 6930000
                                )
                            ],
                            Referencia: [
                                new Referencia(
                                    NroLinRef: 1,
                                    TpoDocRef: '61',
                                    FolioRef: '1268',
                                    FchRef: new DateTime('2024-10-17'),
                                    CodRef: TipoReferencia::AnulaDocumentoReferencia,
                                    RazonRef: 'Anular'
                                )
                            ]
                        )
                    );

                    $sucursal = 'Casa Matriz';
                    $motivo = ReasonType::Otros;

                    // Act
                    $result = $this->facturacionService->EmisionNC_NDV2Async($sucursal, $motivo, $request)->wait();

                    // Assert
                    $this->assertNotNull($result, 'El resultado no debe ser nulo.');
                    $this->assertEquals(200, $result->Status, 'El estado de la respuesta debe ser 200.');
                    $this->assertInstanceOf(InvoiceData::class, $result->Data, 'Los datos deben ser una instancia de InvoiceData.');
                    $this->assertEquals('76269769-6', $result->Data->rutEmisor, 'El RUT del emisor debe ser "76269769-6".');
                    $this->assertEquals('77225200-5', $result->Data->rutReceptor, 'El RUT del receptor debe ser "77225200-5".');
                    $this->assertNotNull($result->Message, 'El mensaje no debe ser nulo.');
                    $this->assertNull($result->Errors, 'Los errores deben ser nulos.');

                    $exito = true;
                } else {
                    throw new \Exception('Error: Sin folios');
                }
            } catch (\Exception $ex) {
                $ultimaExcepcion = $ex;

                if ($intentoActual < $maxIntentos) {
                    sleep(1);
                }
            }
        }

        if (!$exito) {
            $this->fail("La prueba falló después de $maxIntentos intentos. Último error: {$ultimaExcepcion->getMessage()}");
        }
    }

    public function testEmisionNC_NDV2Async_ReturnsBadRequest_WhenTipoDTEIsNotFound()
    {
        $request = new RequestDTE(
            Documento: new Documento(
                Encabezado: new Encabezado(
                    IdDoc: new IdentificacionDTE(
                        //TipoDTE: DTEType::NotaCreditoElectronica,
                        FchEmis: new DateTime(),
                        FmaPago: FormaPago::Credito,
                        FchVenc: (new DateTime())->modify('+6 months')
                    ),
                    Emisor: new Emisor(
                        RUTEmisor: '76269769-6',
                        RznSoc: 'SERVICIOS INFORMATICOS CHILESYSTEMS EIRL',
                        GiroEmis: 'Desarrollo de software',
                        Telefono: ['912345678'],
                        CorreoEmisor: 'felipe.anzola@erke.cl',
                        Acteco: [620900],
                        DirOrigen: 'Chile',
                        CmnaOrigen: 'Chile',
                        CiudadOrigen: 'Chile'
                    ),
                    Receptor: new Receptor(
                        RUTRecep: '77225200-5',
                        RznSocRecep: 'ARRENDADORA DE VEHÍCULOS S.A.',
                        GiroRecep: '451001 - VENTA AL POR MAYOR DE VEHÍCULOS AUTOMOTORES',
                        CorreoRecep: 'terceros-77225200@dte.iconstruye.com',
                        DirRecep: 'Rondizzoni 2130',
                        CmnaRecep: 'SANTIAGO',
                        CiudadRecep: 'SANTIAGO'
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
                        NmbItem: 'CERRADURA DE SEGURIDAD (2PIEZA).SATURN EVO',
                        CdgItem: [
                            new CodigoItem(
                                TpoCodigo: '4',
                                VlrCodigo: 'EVO_2'
                            )
                        ],
                        QtyItem: 42.0,
                        UnmdItem: 'unid',
                        PrcItem: 319166.0,
                        MontoItem: 6930000
                    )
                ],
                Referencia: [
                    new Referencia(
                        NroLinRef: 1,
                        TpoDocRef: '61',
                        FolioRef: '1268',
                        FchRef: new DateTime('2024-10-17'),
                        CodRef: TipoReferencia::AnulaDocumentoReferencia,
                        RazonRef: 'Anular'
                    )
                ]
            )
        );

        $sucursal = 'Casa Matriz';
        $motivo = ReasonType::Otros;

        // Act
        $result = $this->facturacionService->EmisionNC_NDV2Async($sucursal, $motivo, $request)->wait();

        // Assert
        $this->assertNotNull($result, 'El resultado no debe ser nulo.');
        $this->assertEquals(400, $result->Status, 'El estado de la respuesta debe ser 400.');
        $this->assertFalse($result->Data);
        $this->assertNotNull($result->Errors, 'Los errores no deben ser nulos.');
        $this->assertCount(1, $result->Errors, 'Debe haber exactamente un error.');
        $this->assertEquals("Error interno", $result->Message);
        $this->assertContains("Tipo dte vacio", $result->Errors, 'Los errores deben contener "Tipo dte vacio".');
    }

    public function testListadoDtesEmitidosAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6',
                rutContribuyente: '10422710-4',
                nombreSucursal: 'Casa Matriz'
            ),
            ambiente: Ambiente::Certificacion,
            folio: 0,
            codigoTipoDte: DTEType::NotSet,
            desde: new DateTime('2024-08-01'), // Fecha desde
            hasta: new DateTime('2024-08-17')  // Fecha hasta
        );

        // Act
        $response = $this->facturacionService->ListadoDtesEmitidosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
    }

    public function testListadoDtesEmitidosAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-2',
                rutContribuyente: '10422710-4',
                nombreSucursal: 'Casa Matriz'
            ),
            ambiente: Ambiente::Certificacion,
            folio: 0,
            codigoTipoDte: DTEType::NotSet,
            desde: new DateTime('2024-08-01'), // Fecha desde
            hasta: new DateTime('2024-08-17')  // Fecha hasta
        );

        // Act
        $response = $this->facturacionService->ListadoDtesEmitidosAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
    }

    public function testEnvioMailAsync_ReturnsOkResult_WhenEmailIsSentSuccessfully()
    {
        // Arrange
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

        // Act
        $response = $this->facturacionService->EnvioMailAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
    }

    public function testEnvioMailAsync_ReturnsError_WhenEmailSendingFails()
    {
        // Arrange
        $request = new EnvioMailRequest(
            rutEmpresa: "76269769-5",
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

        // Act
        $response = $this->facturacionService->EnvioMailAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
    }

    public function testConsolidadoVentasAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-6'
            ),
            ambiente: Ambiente::Certificacion,
            desde: new DateTime("2023-10-25"), // Fecha desde
            hasta: new DateTime("2023-10-30")  // Fecha hasta
        );

        // Act
        $response = $this->facturacionService->ConsolidadoVentasAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertNotNull($response->Data, 'Los datos no deben ser nulos.');
        $this->assertEquals("Exito", $response->Message);
    }

    public function testConsolidadoVentasAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $request = new ListadoDteRequest(
            credenciales: new Credenciales(
                rutEmisor: '76269769-9'
            ),
            ambiente: Ambiente::Certificacion,
            desde: new DateTime("2023-10-25"), // Fecha desde
            hasta: new DateTime("2023-10-30")  // Fecha hasta
        );

        // Act
        $response = $this->facturacionService->ConsolidadoVentasAsync($request)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
        $this->assertNotNull("Error interno",$response->Message);
        $this->assertEquals("Error al obtener consolidado de emitidos desde api", $response->Data);
    }

    public function testConsolidadoEmitidosAsync_ReturnsOkResult_WhenRequestIsValid()
    {
        // Arrange
        $credenciales = new Credenciales(
            rutEmisor: '76269769-6'
        );

        $mes = 5;
        $anio = 2024;

        // Act
        $response = $this->facturacionService->ConsolidadoEmitidosAsync($credenciales, $mes, $anio)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertEquals(200, $response->Status, 'El estado de la respuesta debe ser 200.');
        $this->assertEquals("Datos Obtenidos correctamente",$response->Data);
        $this->assertEquals("Datos Obtenidos correctamente",$response->Message);
    }

    public function testConsolidadoEmitidosAsync_ReturnsError_WhenRequestIsInvalid()
    {
        // Arrange
        $credenciales = new Credenciales(
            rutEmisor: '76269769-9'
        );

        $mes = 5;
        $anio = 2024;

        // Act
        $response = $this->facturacionService->ConsolidadoEmitidosAsync($credenciales, $mes, $anio)->wait();

        // Assert
        $this->assertNotNull($response, 'El resultado no debe ser nulo.');
        $this->assertNotEquals(200, $response->Status, 'El estado de la respuesta no debe ser 200.');
        $this->assertNotNull($response->Errors, 'Los errores no deben ser nulos.');
    }

    private function solicitarFolio($tipo, $cantidad)
    {
        $request = new FolioRequest(
            new Credenciales(
                rutEmisor: '76269769-6',
                nombreSucursal: 'Casa Matriz'
            ),
            $cantidad,
            $tipo
        );

        $result = $this->_folioService->SolicitarFoliosAsync($request)->wait();

        if ($result && $result->Status === 200) {
            return [true, $result->Data->Desde];
        }

        return [false, 0];
    }

}
