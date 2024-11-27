<?php

namespace SDKSimpleFactura\Models\Facturacion;

class ReporteDTE
{
    /**
     * Fecha del reporte.
     * @var \DateTime
     */
    public \DateTime $Fecha;

    /**
     * Tipos de DTE.
     * @var string
     */
    public string $TiposDTE;

    /**
     * Número de documentos emitidos.
     * @var int
     */
    public int $Emitidos;

    /**
     * Número de documentos anulados.
     * @var int
     */
    public int $Anulados;

    /**
     * Total neto de los DTE.
     * @var float
     */
    public float $TotalNeto;

    /**
     * Total exento de los DTE.
     * @var float
     */
    public float $TotalExento;

    /**
     * Total IVA de los DTE.
     * @var float
     */
    public float $TotalIva;

    /**
     * Total general de los DTE.
     * @var float
     */
    public float $Total;

    /**
     * Detalles del DTE.
     * @var DetalleDte[]
     */
    public array $Detalle;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->Fecha = new \DateTime();
        $this->TiposDTE = '';
        $this->Emitidos = 0;
        $this->Anulados = 0;
        $this->TotalNeto = 0.0;
        $this->TotalExento = 0.0;
        $this->TotalIva = 0.0;
        $this->Total = 0.0;
        $this->Detalle = [];
    }
}
