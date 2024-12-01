<?php

namespace SDKSimpleFactura\Models\Response;

class ImpuestoEnt
{
    /**
     * ID del impuesto.
     * @var int
     */
    public ?int $impuestoId;

    /**
     * Nombre del impuesto.
     * @var string
     */
    public ?string $nombre;

    /**
     * Valor del impuesto.
     * @var float
     */
    public ?float $valor;

    /**
     * Indica si es retención.
     * @var bool
     */
    public ?bool $isRetencion;

    /**
     * Indica si está activo.
     * @var bool
     */
    public ?bool $activo;

    /**
     * Tipo del impuesto.
     * @var int
     */
    public ?int $tipoImpuesto;

    /**
     * Tasa del impuesto.
     * @var float
     */
    public ?float $tasa;

    /**
     * Código del impuesto.
     * @var int
     */
    public ?int $codigo;

    public function __construct(
        ?int $impuestoId = null,
        ?string $nombre = null,
        ?float $valor = null,
        ?bool $isRetencion = null,
        ?bool $activo = null,
        ?int $tipoImpuesto = null,
        ?float $tasa = null,
        ?int $codigo = null
    ) {
        $this->impuestoId = $impuestoId;
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->isRetencion = $isRetencion;
        $this->activo = $activo;
        $this->tipoImpuesto = $tipoImpuesto;
        $this->tasa = $tasa;
        $this->codigo = $codigo;
    }
}
