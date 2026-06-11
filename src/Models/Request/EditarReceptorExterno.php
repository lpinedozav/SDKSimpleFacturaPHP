<?php

namespace SDKSimpleFactura\Models\Request;

class EditarReceptorExterno
{
    public ?string $Rut;
    public ?string $RazonSocial;
    public ?string $Giro;
    public ?string $DirPart;
    public ?string $DirFact;
    public ?string $CorreoPar;
    public ?string $CorreoFact;
    public ?string $Ciudad;
    public ?string $Comuna;

    public function __construct(
        ?string $Rut = null,
        ?string $RazonSocial = null,
        ?string $Giro = null,
        ?string $DirPart = null,
        ?string $DirFact = null,
        ?string $CorreoPar = null,
        ?string $CorreoFact = null,
        ?string $Ciudad = null,
        ?string $Comuna = null
    ) {
        $this->Rut = $Rut;
        $this->RazonSocial = $RazonSocial;
        $this->Giro = $Giro;
        $this->DirPart = $DirPart;
        $this->DirFact = $DirFact;
        $this->CorreoPar = $CorreoPar;
        $this->CorreoFact = $CorreoFact;
        $this->Ciudad = $Ciudad;
        $this->Comuna = $Comuna;
    }
}
