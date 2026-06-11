<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Transacción Payku (/payku/transacciones).
 */
class PaykuTransaccionEnt
{
    public ?string $fecha;
    public ?float $monto;
    public ?string $estado;
    public ?string $receptorRut;
    public ?string $receptorRazonSocial;
    public ?float $porcentaje;
    public ?float $montoNeto;
    public ?int $dteFolio;
    public ?string $tipo;

    public function __construct(
        ?string $fecha = null,
        ?float $monto = null,
        ?string $estado = null,
        ?string $receptorRut = null,
        ?string $receptorRazonSocial = null,
        ?float $porcentaje = null,
        ?float $montoNeto = null,
        ?int $dteFolio = null,
        ?string $tipo = null
    ) {
        $this->fecha = $fecha;
        $this->monto = $monto;
        $this->estado = $estado;
        $this->receptorRut = $receptorRut;
        $this->receptorRazonSocial = $receptorRazonSocial;
        $this->porcentaje = $porcentaje;
        $this->montoNeto = $montoNeto;
        $this->dteFolio = $dteFolio;
        $this->tipo = $tipo;
    }
}
