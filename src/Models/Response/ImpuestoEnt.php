<?php

namespace SDKSimpleFactura\Models\Response;

class ImpuestoEnt
{
    /**
     * ID del impuesto.
     * @var int
     */
    public int $impuestoId;

    /**
     * Nombre del impuesto.
     * @var string
     */
    public string $nombre;

    /**
     * Valor del impuesto.
     * @var float
     */
    public float $valor;

    /**
     * Indica si es retención.
     * @var bool
     */
    public bool $isRetencion;

    /**
     * Indica si está activo.
     * @var bool
     */
    public bool $activo;

    /**
     * Tipo del impuesto.
     * @var int
     */
    public int $tipoImpuesto;

    /**
     * Tasa del impuesto.
     * @var float
     */
    public float $tasa;

    /**
     * Código del impuesto.
     * @var int
     */
    public int $codigo;

    /**
     * Constructor para inicializar valores predeterminados.
     *
     * @param int $impuestoId
     * @param string $nombre
     * @param float $valor
     * @param bool $isRetencion
     * @param bool $activo
     * @param int $tipoImpuesto
     * @param float $tasa
     * @param int $codigo
     */
    public function __construct(
        int $impuestoId,
        string $nombre,
        float $valor,
        bool $isRetencion,
        bool $activo,
        int $tipoImpuesto,
        float $tasa,
        int $codigo
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
