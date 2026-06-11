<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Respuesta de la consulta de última sincronización con el SII
 * (/sii/lastsync/{mes}/{anio}).
 */
class LastSyncResponse
{
    public ?string $empresa;
    public ?string $tipo;
    public ?PeriodoSync $periodo;
    public ?LastSyncBlock $current_Month;
    public ?LastSyncBlock $previous_Month;

    public function __construct(
        ?string $empresa = null,
        ?string $tipo = null,
        ?PeriodoSync $periodo = null,
        ?LastSyncBlock $current_Month = null,
        ?LastSyncBlock $previous_Month = null
    ) {
        $this->empresa = $empresa;
        $this->tipo = $tipo;
        $this->periodo = $periodo;
        $this->current_Month = $current_Month;
        $this->previous_Month = $previous_Month;
    }
}
