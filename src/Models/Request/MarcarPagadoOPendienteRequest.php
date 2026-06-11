<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para marcar un DTE como pagado o pendiente (/dte/marcar-pagado-pendiente).
 */
class MarcarPagadoOPendienteRequest
{
    public ?Credenciales $Credenciales;
    public ?DteReferenciadoExterno $DteReferenciadoExterno;
    public ?bool $Pagado;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?DteReferenciadoExterno $DteReferenciadoExterno = null,
        ?bool $Pagado = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->DteReferenciadoExterno = $DteReferenciadoExterno;
        $this->Pagado = $Pagado;
    }
}
