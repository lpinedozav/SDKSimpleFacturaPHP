<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para listar cesionarios (/cessions/cesionarios).
 */
class CessionariesListRequest
{
    public ?Credenciales $Credenciales;
    public ?string $RutCesionario;
    public ?string $RazonSocial;
    public ?bool $IncluirInactivos;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?string $RutCesionario = null,
        ?string $RazonSocial = null,
        ?bool $IncluirInactivos = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->RutCesionario = $RutCesionario;
        $this->RazonSocial = $RazonSocial;
        $this->IncluirInactivos = $IncluirInactivos;
    }
}
