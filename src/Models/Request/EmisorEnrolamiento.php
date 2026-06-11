<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\Ambiente;

/**
 * Datos del emisor para enrolamiento de empresa.
 */
class EmisorEnrolamiento
{
    public ?string $RutEmpresa;
    public ?string $RazonSocial;
    public ?string $RutRepresentanteLegal;
    public ?string $Giro;
    public ?string $Email;
    public ?string $DireccionFacturacion;
    public ?string $Ciudad;
    public ?string $Comuna;
    public ?string $Telefono;
    public ?string $FechaResolucion;
    public ?int $NumeroResolucion;
    public ?Ambiente $Ambiente;
    public ?string $PasswordSii;
    public ?string $UnidadSii;

    public function __construct(
        ?string $RutEmpresa = null,
        ?string $RazonSocial = null,
        ?string $RutRepresentanteLegal = null,
        ?string $Giro = null,
        ?string $Email = null,
        ?string $DireccionFacturacion = null,
        ?string $Ciudad = null,
        ?string $Comuna = null,
        ?string $Telefono = null,
        ?string $FechaResolucion = null,
        ?int $NumeroResolucion = null,
        ?Ambiente $Ambiente = null,
        ?string $PasswordSii = null,
        ?string $UnidadSii = null
    ) {
        $this->RutEmpresa = $RutEmpresa;
        $this->RazonSocial = $RazonSocial;
        $this->RutRepresentanteLegal = $RutRepresentanteLegal;
        $this->Giro = $Giro;
        $this->Email = $Email;
        $this->DireccionFacturacion = $DireccionFacturacion;
        $this->Ciudad = $Ciudad;
        $this->Comuna = $Comuna;
        $this->Telefono = $Telefono;
        $this->FechaResolucion = $FechaResolucion;
        $this->NumeroResolucion = $NumeroResolucion;
        $this->Ambiente = $Ambiente;
        $this->PasswordSii = $PasswordSii;
        $this->UnidadSii = $UnidadSii;
    }
}
