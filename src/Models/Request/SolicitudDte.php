<?php

namespace SDKSimpleFactura\Models\Request;

class SolicitudDte
{
    public ?Credenciales $credenciales;
    public ?DteReferenciadoExterno $dteReferenciadoExterno;
    public function __construct(
        ?Credenciales $credenciales = null,
        ?DteReferenciadoExterno $dteReferenciadoExterno = null
    ) {
        $this->credenciales = $credenciales;
        $this->dteReferenciadoExterno = $dteReferenciadoExterno;
    }
}
