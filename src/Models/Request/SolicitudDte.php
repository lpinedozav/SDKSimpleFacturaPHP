<?php

namespace SdkSimpleFactura\Models\Request;

class SolicitudDte {
    public Credenciales $credenciales;
    public DteReferenciadoExterno $dteReferenciadoExterno;

    public function __construct(Credenciales $credenciales, DteReferenciadoExterno $dteReferenciadoExterno) {
        $this->credenciales = $credenciales;
        $this->dteReferenciadoExterno = $dteReferenciadoExterno;
    }
}
