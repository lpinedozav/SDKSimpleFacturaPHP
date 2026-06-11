<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Resumen de DTEs de un partner (/partners/dtes/resumen).
 */
class PartnerDteResumenEnt
{
    public ?int $dtes;
    public ?string $nombrePlan;
    public ?int $dtesAdicionales;

    public function __construct(
        ?int $dtes = null,
        ?string $nombrePlan = null,
        ?int $dtesAdicionales = null
    ) {
        $this->dtes = $dtes;
        $this->nombrePlan = $nombrePlan;
        $this->dtesAdicionales = $dtesAdicionales;
    }
}
