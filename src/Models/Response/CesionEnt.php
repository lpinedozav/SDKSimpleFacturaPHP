<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Cesión emitida (/cessions/Issued).
 */
class CesionEnt
{
    public ?int $folio;
    public ?string $rutPersonaAutorizada;
    public ?string $nombrePersonaAutorizada;
    public ?string $fechaEmision;
    public ?int $montoTotal;
    public ?string $estado;
    public ?string $trackid;
    public ?bool $anulado;
    public ?int $codigoTipoDte;
    public ?string $rutCesionario;
    public ?string $razonSocialCesionario;
    public ?string $correoCesionario;
    public ?string $fechaVencimientoFactura;

    public function __construct(
        ?int $folio = null,
        ?string $rutPersonaAutorizada = null,
        ?string $nombrePersonaAutorizada = null,
        ?string $fechaEmision = null,
        ?int $montoTotal = null,
        ?string $estado = null,
        ?string $trackid = null,
        ?bool $anulado = null,
        ?int $codigoTipoDte = null,
        ?string $rutCesionario = null,
        ?string $razonSocialCesionario = null,
        ?string $correoCesionario = null,
        ?string $fechaVencimientoFactura = null
    ) {
        $this->folio = $folio;
        $this->rutPersonaAutorizada = $rutPersonaAutorizada;
        $this->nombrePersonaAutorizada = $nombrePersonaAutorizada;
        $this->fechaEmision = $fechaEmision;
        $this->montoTotal = $montoTotal;
        $this->estado = $estado;
        $this->trackid = $trackid;
        $this->anulado = $anulado;
        $this->codigoTipoDte = $codigoTipoDte;
        $this->rutCesionario = $rutCesionario;
        $this->razonSocialCesionario = $razonSocialCesionario;
        $this->correoCesionario = $correoCesionario;
        $this->fechaVencimientoFactura = $fechaVencimientoFactura;
    }
}
