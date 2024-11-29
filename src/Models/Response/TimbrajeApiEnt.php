<?php

namespace SDKSimpleFactura\Models\Response;

use DateTime;

class TimbrajeApiEnt
{
    /**
     * Código del SII.
     * @var int
     */
    public ?int $codigoSii;

    /**
     * Fecha de ingreso.
     * @var DateTime
     */
    public ?DateTime $fechaIngreso;

    /**
     * Fecha del CAF.
     * @var DateTime|null
     */
    public ?DateTime $fechaCaf = null;

    /**
     * Folio inicial.
     * @var int
     */
    public ?int $desde;

    /**
     * Folio final.
     * @var int
     */
    public ?int $hasta;

    /**
     * Fecha de vencimiento.
     * @var DateTime
     */
    public ?DateTime $fechaVencimiento;

    /**
     * Tipo de DTE.
     * @var string
     */
    public ?string $tipoDte;

    /**
     * Folios disponibles.
     * @var int
     */
    public ?int $foliosDisponibles;

    /**
     * Ambiente.
     * @var int
     */
    public ?int $ambiente;

    /**
     * Constructor por defecto.
     */
    public function __construct(
        ?int $codigoSii = null,
        ?DateTime $fechaIngreso = null,
        ?DateTime $fechaCaf = null,
        ?int $desde = null,
        ?int $hasta = null,
        ?DateTime $fechaVencimiento = null,
        ?string $tipoDte = null,
        ?int $foliosDisponibles = null
        )
        {
            $this->codigoSii = $codigoSii;
            $this->fechaIngreso = $fechaIngreso;
            $this->fechaCaf = $fechaCaf;
            $this->desde = $desde;
            $this->hasta = $hasta;
            $this->fechaVencimiento = $fechaVencimiento;
            $this->tipoDte = $tipoDte;
            $this->foliosDisponibles = $foliosDisponibles;
        }
    
}
