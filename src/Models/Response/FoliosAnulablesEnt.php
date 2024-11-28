<?php

namespace SDKSimpleFactura\Models\Response;

class FoliosAnulablesEnt
{
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
     * Obtiene la cantidad de folios anulables.
     * Calculado como la diferencia entre `$Hasta` y `$Desde` más uno.
     * @return int
     */
    public function getCantidad(): int
    {
        return $this->Hasta - $this->Desde + 1;
    }

    /**
     * Constructor para inicializar valores predeterminados.
     *
     * @param int $desde
     * @param int $hasta
     */
    public function __construct(int $desde = 0, int $hasta = 0)
    {
        $this->Desde = $desde;
        $this->Hasta = $hasta;
    }
}
