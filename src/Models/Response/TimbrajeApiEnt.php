<?php

namespace SDKSimpleFactura\Models\Response;

use DateTime;

class TimbrajeApiEnt
{
    /**
     * Código del SII.
     * @var int
     */
    public int $CodigoSii;

    /**
     * Fecha de ingreso.
     * @var DateTime
     */
    public DateTime $FechaIngreso;

    /**
     * Fecha del CAF.
     * @var DateTime|null
     */
    public ?DateTime $FechaCaf = null;

    /**
     * Folio inicial.
     * @var int
     */
    public int $Desde;

    /**
     * Folio final.
     * @var int
     */
    public int $Hasta;

    /**
     * Fecha de vencimiento.
     * @var DateTime
     */
    public DateTime $FechaVencimiento;

    /**
     * Tipo de DTE.
     * @var string
     */
    public string $TipoDte;

    /**
     * Folios disponibles.
     * @var int
     */
    public int $FoliosDisponibles;

    /**
     * Ambiente.
     * @var int
     */
    public int $Ambiente;

    /**
     * Constructor por defecto.
     */
    public function __construct()
    {
        $this->CodigoSii = 0;
        $this->TipoDte = '';
    }

    /**
     * Constructor que inicializa desde un objeto `TimbrajeEnt`.
     *
     * @param TimbrajeEnt|null $ent
     */
    public static function fromTimbrajeEnt(?TimbrajeEnt $ent): self
    {
        $instance = new self();

        if ($ent !== null) {
            $instance->CodigoSii = $ent->CodigoSii;
            $instance->FechaIngreso = $ent->FechaIngreso;
            $instance->FechaCaf = $ent->FechaCaf;
            $instance->Desde = $ent->Desde;
            $instance->Hasta = $ent->Hasta;
            $instance->FechaVencimiento = $ent->FechaVencimiento;
            $instance->TipoDte = $ent->TipoDte;
            $instance->FoliosDisponibles = $ent->FoliosDisponibles;
            $instance->Ambiente = $ent->Ambiente;
        }

        return $instance;
    }
}
