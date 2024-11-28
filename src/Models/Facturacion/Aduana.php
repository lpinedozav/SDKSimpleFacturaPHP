<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\ClausulaCompraVenta;
use SDKSimpleFactura\Enum\ModalidadVenta;
use SDKSimpleFactura\Enum\Paises;
use SDKSimpleFactura\Enum\Puertos;
use SDKSimpleFactura\Enum\UnidadMedida;
use SDKSimpleFactura\Enum\ViasDeTransporte;

class Aduana
{
    /**
     * Código según tabla "Modalidad de Venta" de Aduana Enum.
     * @var ModalidadVenta
     */
    public ?ModalidadVenta $CodModVenta;

    /**
     * Código según tabla "Cláusula compra-venta" de Aduana Enum.
     * @var ClausulaCompraVenta
     */
    public ?ClausulaCompraVenta $CodClauVenta;

    /**
     * Total cláusula de venta.
     * @var float
     */
    public ?float $TotClauVenta;

    /**
     * Código de la vía de transporte utilizada Enum.
     * @var ViasDeTransporte
     */
    public ?ViasDeTransporte $CodViaTransp;

    /**
     * Nombre o identificación del medio de transporte.
     * @var string
     */
    public ?string $NombreTransp;

    /**
     * RUT de la compañía transportadora.
     * @var string
     */
    public ?string $RUTCiaTransp;

    /**
     * Nombre de la compañía transportadora.
     * @var string
     */
    public ?string $NomCiaTransp;

    /**
     * Identificador adicional de la compañía transportadora.
     * @var string
     */
    public ?string $IdAdicTransp;

    /**
     * Número de reserva del operador (Booking).
     * @var string
     */
    public ?string $Booking;

    /**
     * Código del operador.
     * @var string
     */
    public ?string $Operador;

    /**
     * Código del puerto de embarque Enum.
     * @var Puertos
     */
    public ?Puertos $CodPtoEmbarque;

    /**
     * Identificador adicional del puerto de embarque.
     * @var string
     */
    public ?string $IdAdicPtoEmb;

    /**
     * Código del puerto de desembarque Enum.
     * @var Puertos
     */
    public ?Puertos $CodPtoDesemb;

    /**
     * Identificador adicional del puerto de desembarque.
     * @var string
     */
    public ?string $IdAdicPtoDesemb;

    /**
     * Tara.
     * @var int
     */
    public ?int $Tara;

    /**
     * Código de la unidad de medida según tabla de Aduana Enum.
     * @var UnidadMedida
     */
    public ?UnidadMedida $CodUnidMedTara;

    /**
     * Peso bruto.
     * @var float
     */
    public ?float $PesoBruto;

    /**
     * Código de la unidad de medida del peso bruto Enum.
     * @var UnidadMedida
     */
    public ?UnidadMedida $CodUnidPesoBruto;

    /**
     * Peso neto.
     * @var float
     */
    public ?float $PesoNeto;

    /**
     * Código de la unidad de medida del peso neto Enum.
     * @var UnidadMedida
     */
    public ?UnidadMedida $CodUnidPesoNeto;

    /**
     * Total de ítems del documento.
     * @var int
     */
    public ?int $TotItems;

    /**
     * Cantidad de bultos que ampara el documento.
     * @var int
     */
    public ?int $TotBultos;

    /** @var TipoBulto[] */
    public ?array $TipoBultos = [];

    /**
     * Monto del flete.
     * @var float
     */
    public ?float $MntFlete;

    /**
     * Monto del seguro.
     * @var float
     */
    public ?float $MntSeguro;

    /**
     * Código del país del receptor extranjero Enum.
     * @var Paises
     */
    public ?Paises $CodPaisRecep;

    /**
     * Código del país de destino extranjero Enum.
     * @var Paises
     */
    public ?Paises $CodPaisDestin;

    public function __construct(
        ?ModalidadVenta $CodModVenta = null,
        ?ClausulaCompraVenta $CodClauVenta = null,
        ?float $TotClauVenta = null,
        ?ViasDeTransporte $CodViaTransp = null,
        ?string $NombreTransp = null,
        ?string $RUTCiaTransp = null,
        ?string $NomCiaTransp = null,
        ?string $IdAdicTransp = null,
        ?string $Booking = null,
        ?string $Operador = null,
        ?Puertos $CodPtoEmbarque = null,
        ?string $IdAdicPtoEmb = null,
        ?Puertos $CodPtoDesemb = null,
        ?string $IdAdicPtoDesemb = null,
        ?int $Tara = null,
        ?UnidadMedida $CodUnidMedTara = null,
        ?float $PesoBruto = null,
        ?UnidadMedida $CodUnidPesoBruto = null,
        ?float $PesoNeto = null,
        ?UnidadMedida $CodUnidPesoNeto = null,
        ?int $TotItems = null,
        ?int $TotBultos = null,
        ?array $TipoBultos = null,
        ?float $MntFlete = null,
        ?float $MntSeguro = null,
        ?Paises $CodPaisRecep = null,
        ?Paises $CodPaisDestin = null
    ) {
        $this->CodModVenta = $CodModVenta;
        $this->CodClauVenta = $CodClauVenta;
        $this->TotClauVenta = $TotClauVenta;
        $this->CodViaTransp = $CodViaTransp;
        $this->NombreTransp = $NombreTransp;
        $this->RUTCiaTransp = $RUTCiaTransp;
        $this->NomCiaTransp = $NomCiaTransp;
        $this->IdAdicTransp = $IdAdicTransp;
        $this->Booking = $Booking;
        $this->Operador = $Operador;
        $this->CodPtoEmbarque = $CodPtoEmbarque;
        $this->IdAdicPtoEmb = $IdAdicPtoEmb;
        $this->CodPtoDesemb = $CodPtoDesemb;
        $this->IdAdicPtoDesemb = $IdAdicPtoDesemb;
        $this->Tara = $Tara;
        $this->CodUnidMedTara = $CodUnidMedTara;
        $this->PesoBruto = $PesoBruto;
        $this->CodUnidPesoBruto = $CodUnidPesoBruto;
        $this->PesoNeto = $PesoNeto;
        $this->CodUnidPesoNeto = $CodUnidPesoNeto;
        $this->TotItems = $TotItems;
        $this->TotBultos = $TotBultos;
        $this->TipoBultos = $TipoBultos;
        $this->MntFlete = $MntFlete;
        $this->MntSeguro = $MntSeguro;
        $this->CodPaisRecep = $CodPaisRecep;
        $this->CodPaisDestin = $CodPaisDestin;
    }
}
