<?php

namespace SDKSimpleFactura\Models\Response;

class ImpuestoEnt
{
    /**
     * ID del impuesto.
     * @var int
     */
    public int $ImpuestoId;

    /**
     * Nombre del impuesto.
     * @var string
     */
    public string $Nombre;

    /**
     * Valor del impuesto.
     * @var float
     */
    public float $Valor;

    /**
     * Indica si es retención.
     * @var bool
     */
    public bool $IsRetencion;

    /**
     * Indica si está activo.
     * @var bool
     */
    public bool $Activo;

    /**
     * Tipo del impuesto.
     * @var int
     */
    public int $TipoImpuesto;

    /**
     * Tasa del impuesto.
     * @var float
     */
    public float $Tasa;

    /**
     * Código del impuesto.
     * @var int
     */
    public int $Codigo;

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
        int $impuestoId = 0,
        string $nombre = '',
        float $valor = 0.0,
        bool $isRetencion = false,
        bool $activo = false,
        int $tipoImpuesto = 0,
        float $tasa = 0.0,
        int $codigo = 0
    ) {
        $this->ImpuestoId = $impuestoId;
        $this->Nombre = $nombre;
        $this->Valor = $valor;
        $this->IsRetencion = $isRetencion;
        $this->Activo = $activo;
        $this->TipoImpuesto = $tipoImpuesto;
        $this->Tasa = $tasa;
        $this->Codigo = $codigo;
    }
}
