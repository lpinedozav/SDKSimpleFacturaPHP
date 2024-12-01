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
    public ?string $RUTMandante;

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
    public ?string $RUTSolicita;

    /**
     * Información de transporte de mercaderías.
     * @var Transporte|null
     */
    public ?Transporte $Transporte;

    /**
     * Montos totales del DTE.
     * @var Totales
     */
    public Totales $Totales;

    /**
     * Otra moneda.
     * @var OtraMoneda|null
     */
    public ?OtraMoneda $OtraMoneda;

    /**
     * Constructor para inicializar las propiedades con valores predeterminados.
     */
    public function __construct(
        ?IdentificacionDTE $IdDoc = null,
        ?Emisor $Emisor = null,
        ?Receptor $Receptor = null,
        ?Totales $Totales = null,
        ?string $RUTMandante = null,
        ?string $RUTSolicita = null,
        ?Transporte $Transporte = null,
        ?OtraMoneda $OtraMoneda = null
    ) {
        $this->IdDoc = $IdDoc;
        $this->Emisor = $Emisor;
        $this->Receptor = $Receptor;
        $this->Totales = $Totales;
        $this->RUTMandante = $RUTMandante;
        $this->RUTSolicita = $RUTSolicita;
        $this->Transporte = $Transporte;
        $this->OtraMoneda = $OtraMoneda;
    }
}
