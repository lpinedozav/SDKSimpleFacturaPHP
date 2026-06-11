<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Información de un contribuyente del SII
 * (/contribuyentes/correo-intercambio/{rut}).
 */
class ContribuyenteSiiEnt
{
    public ?string $rut;
    public ?string $razonSocial;
    public ?string $correoIntercambio;
    public ?string $fechaActualizacion;

    public function __construct(
        ?string $rut = null,
        ?string $razonSocial = null,
        ?string $correoIntercambio = null,
        ?string $fechaActualizacion = null
    ) {
        $this->rut = $rut;
        $this->razonSocial = $razonSocial;
        $this->correoIntercambio = $correoIntercambio;
        $this->fechaActualizacion = $fechaActualizacion;
    }
}
