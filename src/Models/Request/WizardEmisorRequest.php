<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\PlanUsuario;

/**
 * Request para enrolar una empresa (/partners/enrolamiento-empresa).
 */
class WizardEmisorRequest
{
    public ?EmisorEnrolamiento $Emisor;
    public ?SucursalEnrolamiento $Sucursal;
    /** @var int[]|null */
    public ?array $ActividadesEconomicas;
    public ?PlanUsuario $Plan;

    public function __construct(
        ?EmisorEnrolamiento $Emisor = null,
        ?SucursalEnrolamiento $Sucursal = null,
        ?array $ActividadesEconomicas = null,
        ?PlanUsuario $Plan = null
    ) {
        $this->Emisor = $Emisor;
        $this->Sucursal = $Sucursal;
        $this->ActividadesEconomicas = $ActividadesEconomicas;
        $this->Plan = $Plan;
    }
}
