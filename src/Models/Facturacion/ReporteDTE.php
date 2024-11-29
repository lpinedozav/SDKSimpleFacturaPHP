<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;

class ReporteDTE
{
    /**
     * Fecha del reporte.
     * @var DateTime
     */
    public ?DateTime $fecha;

    /**
     * Tipos de DTE.
     * @var string
     */
    public ?string $tiposDTE;

    /**
     * Número de documentos emitidos.
     * @var int
     */
    public ?int $emitidos;

    /**
     * Número de documentos anulados.
     * @var int
     */
    public ?int $anulados;

    /**
     * Total neto de los DTE.
     * @var float
     */
    public ?float $totalNeto;

    /**
     * Total exento de los DTE.
     * @var float
     */
    public ?float $totalExento;

    /**
     * Total IVA de los DTE.
     * @var float
     */
    public ?float $totalIva;

    /**
     * Total general de los DTE.
     * @var float
     */
    public ?float $total;

    /**
     * Detalles del DTE.
     * @var DetalleDte[]
     */
    public ?array $detalle;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?DateTime $fecha = null,
        ?string $tiposDTE = null,
        ?int $emitidos = null,
        ?int $anulados = null,
        ?float $totalNeto = null,
        ?float $totalExento = null,
        ?float $totalIva = null,
        ?float $total = null,
        ?array $detalle = []
    ) {
        $this->fecha = $fecha;
        $this->tiposDTE = $tiposDTE;
        $this->emitidos = $emitidos;
        $this->anulados = $anulados;
        $this->totalNeto = $totalNeto;
        $this->totalExento = $totalExento;
        $this->totalIva = $totalIva;
        $this->total = $total;
        $this->detalle = $detalle;
    }
}
