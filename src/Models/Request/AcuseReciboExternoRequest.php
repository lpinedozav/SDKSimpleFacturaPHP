<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\RejectionType;
use SDKSimpleFactura\Enum\ResponseType;

class AcuseReciboExternoRequest
{
    public ?Credenciales $credenciales;
    public ?DteReferenciadoExterno $dteReferenciadoExterno;
    public ?ResponseType $respuesta;
    public ?RejectionType $tipoRechazo;

    public ?string $comentario;
    public function __construct(
        ?Credenciales $credenciales = null,
        ?DteReferenciadoExterno $dteReferenciadoExterno = null,
        ?ResponseType $respuesta = null,
        ?RejectionType $tipoRechazo = null,
        ?string $comentario = null
    ) {
        $this->credenciales = $credenciales;
        $this->dteReferenciadoExterno = $dteReferenciadoExterno;
        $this->respuesta = $respuesta;
        $this->tipoRechazo = $tipoRechazo;
        $this->comentario = $comentario;
    }
}
