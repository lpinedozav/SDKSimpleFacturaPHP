<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\RejectionType;
use SDKSimpleFactura\Enum\ResponseType;

class AcuseReciboExternoRequest
{
    public ?Credenciales $credenciales;
    public ?DteReferenciadoExterno $dteReferenciadoExterno;
    public ?ResponseType $Respuesta;
    public ?RejectionType $tipoRechazo;
    public function __construct(
        ?string $credenciales = null,
        ?string $dteReferenciadoExterno = null,
        ?ResponseType $Respuesta = null,
        ?RejectionType $tipoRechazo = null
    ) {
        $this->credenciales = $credenciales;
        $this->dteReferenciadoExterno = $dteReferenciadoExterno;
        $this->Respuesta = $Respuesta;
        $this->tipoRechazo = $tipoRechazo;
    }
}
