<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Request para anular un rango de folios (/folios/anular).
 */
class AnularFoliosRequest
{
    public ?Credenciales $Credenciales;
    public ?int $CodigoTipoDte;
    public ?int $Ambiente;
    public ?int $FolioInicio;
    public ?int $FolioTermino;
    public ?string $MotivoAnulacion;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?int $CodigoTipoDte = null,
        ?int $Ambiente = null,
        ?int $FolioInicio = null,
        ?int $FolioTermino = null,
        ?string $MotivoAnulacion = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->CodigoTipoDte = $CodigoTipoDte;
        $this->Ambiente = $Ambiente;
        $this->FolioInicio = $FolioInicio;
        $this->FolioTermino = $FolioTermino;
        $this->MotivoAnulacion = $MotivoAnulacion;
    }
}
