<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Encabezado
{
    /**
     * Identificación y totales del documento.
     * @var IdentificacionDTE
     */
    public IdentificacionDTE $IdDoc;

    /**
     * Datos del emisor.
     * @var Emisor
     */
    public Emisor $Emisor;

    /**
     * RUT a cuenta de quien se emite el DTE.
     * Corresponde al RUT del mandante.
     * @var string|null
     */
    public ?string $RUTMandante = null;

    /**
     * Datos del receptor.
     * @var Receptor
     */
    public Receptor $Receptor;

    /**
     * RUT que solicita el DTE en venta a público.
     * Obligatorio si es distinto de RUT receptor.
     * @var string|null
     */
    public ?string $RUTSolicita = null;

    /**
     * Información de transporte de mercaderías.
     * @var Transporte|null
     */
    public ?Transporte $Transporte = null;

    /**
     * Montos totales del DTE.
     * @var Totales
     */
    public Totales $Totales;

    /**
     * Otra moneda.
     * @var OtraMoneda|null
     */
    public ?OtraMoneda $OtraMoneda = null;

    /**
     * Constructor para inicializar las propiedades con valores predeterminados.
     */
    public function __construct()
    {
        $this->RUTMandante = '';
        $this->RUTSolicita = '';
        $this->IdDoc = new IdentificacionDTE();
        $this->Emisor = new Emisor();
        $this->Receptor = new Receptor();
        $this->Transporte = null;
        $this->Totales = new Totales();
        $this->OtraMoneda = new OtraMoneda();
    }
}
