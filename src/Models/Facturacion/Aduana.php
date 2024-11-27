<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Aduana
{
    /**
     * Código según tabla "Modalidad de Venta" de Aduana Enum.
     * @var int
     */
    public int $CodModVenta;

    /**
     * Código según tabla "Cláusula compra-venta" de Aduana Enum.
     * @var int
     */
    public int $CodClauVenta;

    /**
     * Total cláusula de venta.
     * @var float
     */
    private float $TotClauVenta;

    /**
     * Código de la vía de transporte utilizada Enum.
     * @var int
     */
    public int $CodViaTransp;

    /**
     * Nombre o identificación del medio de transporte.
     * @var string
     */
    private string $NombreTransp;

    /**
     * RUT de la compañía transportadora.
     * @var string
     */
    public string $RUTCiaTransp;

    /**
     * Nombre de la compañía transportadora.
     * @var string
     */
    public string $NomCiaTransp;

    /**
     * Identificador adicional de la compañía transportadora.
     * @var string
     */
    public string $IdAdicTransp;

    /**
     * Número de reserva del operador (Booking).
     * @var string
     */
    public string $Booking;

    /**
     * Código del operador.
     * @var string
     */
    public string $Operador;

    /**
     * Código del puerto de embarque Enum.
     * @var int
     */
    public int $CodPtoEmbarque;

    /**
     * Identificador adicional del puerto de embarque.
     * @var string
     */
    public string $IdAdicPtoEmb;

    /**
     * Código del puerto de desembarque Enum.
     * @var int
     */
    public int $CodPtoDesemb;

    /**
     * Identificador adicional del puerto de desembarque.
     * @var string
     */
    public string $IdAdicPtoDesemb;

    /**
     * Tara.
     * @var int
     */
    public int $Tara;

    /**
     * Código de la unidad de medida según tabla de Aduana Enum.
     * @var int
     */
    public int $CodUnidMedTara;

    /**
     * Peso bruto.
     * @var float
     */
    public float $PesoBruto;

    /**
     * Código de la unidad de medida del peso bruto Enum.
     * @var int
     */
    public int $CodUnidPesoBruto;

    /**
     * Peso neto.
     * @var float
     */
    public float $PesoNeto;

    /**
     * Código de la unidad de medida del peso neto Enum.
     * @var int
     */
    public int $CodUnidPesoNeto;

    /**
     * Total de ítems del documento.
     * @var int
     */
    public int $TotItems;

    /**
     * Cantidad de bultos que ampara el documento.
     * @var int
     */
    public int $TotBultos;

    /** @var TipoBulto[] */
    public array $TipoBultos = [];

    /**
     * Monto del flete.
     * @var float
     */
    public float $MntFlete;

    /**
     * Monto del seguro.
     * @var float
     */
    public float $MntSeguro;

    /**
     * Código del país del receptor extranjero Enum.
     * @var int
     */
    public int $CodPaisRecep;

    /**
     * Código del país de destino extranjero Enum.
     * @var int
     */
    public int $CodPaisDestin;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->CodModVenta = 0;
        $this->CodClauVenta = 0;
        $this->TotClauVenta = 0.0;
        $this->CodViaTransp = 0;
        $this->NombreTransp = '';
        $this->RUTCiaTransp = '';
        $this->NomCiaTransp = '';
        $this->IdAdicTransp = '';
        $this->Booking = '';
        $this->Operador = '';
        $this->CodPtoEmbarque = 0;
        $this->IdAdicPtoEmb = '';
        $this->CodPtoDesemb = 0;
        $this->IdAdicPtoDesemb = '';
        $this->Tara = 0;
        $this->CodUnidMedTara = 0;
        $this->PesoBruto = 0.0;
        $this->CodUnidPesoBruto = 0;
        $this->PesoNeto = 0.0;
        $this->CodUnidPesoNeto = 0;
        $this->TotItems = 0;
        $this->TotBultos = 0;
        $this->TipoBultos = [];
        $this->MntFlete = 0.0;
        $this->MntSeguro = 0.0;
        $this->CodPaisRecep = 0;
        $this->CodPaisDestin = 0;
    }

    // Métodos Getters y Setters con redondeo y truncamiento

    public function getTotClauVenta(): float
    {
        return round($this->TotClauVenta, 2);
    }

    public function setTotClauVenta(float $value): void
    {
        $this->TotClauVenta = $value;
    }

    public function getNombreTransp(): string
    {
        return $this->truncate($this->NombreTransp, 40);
    }

    public function setNombreTransp(string $value): void
    {
        $this->NombreTransp = $this->truncate($value, 40);
    }

    private function truncate(string $value, int $length): string
    {
        return mb_substr($value, 0, $length);
    }
}
