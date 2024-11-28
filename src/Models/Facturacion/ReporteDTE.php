<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;

class ReporteDTE
{
    /**
     * Fecha del reporte.
     * @var DateTime
     */
    public ?DateTime $Fecha;

    /**
     * Tipos de DTE.
     * @var string
     */
    public ?string $TiposDTE;

    /**
     * Número de documentos emitidos.
     * @var int
     */
    public ?int $Emitidos;

    /**
     * Número de documentos anulados.
     * @var int
     */
    public ?int $Anulados;

    /**
     * Total neto de los DTE.
     * @var float
     */
    public ?float $TotalNeto;

    /**
     * Total exento de los DTE.
     * @var float
     */
    public ?float $TotalExento;

    /**
     * Total IVA de los DTE.
     * @var float
     */
    public ?float $TotalIva;

    /**
     * Total general de los DTE.
     * @var float
     */
    public ?float $Total;

    /**
     * Detalles del DTE.
     * @var DetalleDte[]
     */
    public ?array $Detalle;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?DateTime $Fecha = null,
        ?string $TiposDTE = null,
        ?int $Emitidos = null,
        ?int $Anulados = null,
        ?float $TotalNeto = null,
        ?float $TotalExento = null,
        ?float $TotalIva = null,
        ?float $Total = null,
        ?array $Detalle = []
    ) {
        $this->Fecha = $Fecha;
        $this->TiposDTE = $TiposDTE;
        $this->Emitidos = $Emitidos;
        $this->Anulados = $Anulados;
        $this->TotalNeto = $TotalNeto;
        $this->TotalExento = $TotalExento;
        $this->TotalIva = $TotalIva;
        $this->Total = $Total;
        $this->Detalle = $Detalle;
    }
}
