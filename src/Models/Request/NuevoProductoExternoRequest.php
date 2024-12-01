<?php

namespace SDKSimpleFactura\Models\Request;

class NuevoProductoExternoRequest
{
    /**
     * @var string
     */
    public string $nombre;

    /**
     * @var string
     */
    public string $codigoBarra;

    /**
     * @var string
     */
    public string $unidadMedida;

    /**
     * @var float
     */
    public float $precio;

    /**
     * @var bool
     */
    public bool $exento;

    /**
     * @var bool
     */
    public bool $tieneImpuestos;

    /**
     * @var int[]
     */
    public array $impuestos;

    /**
     * Constructor
     *
     * @param string $nombre
     * @param string $codigoBarra
     * @param string $unidadMedida
     * @param float $precio
     * @param bool $exento
     * @param bool $tieneImpuestos
     * @param int[] $impuestos
     */
    public function __construct(
        string $nombre,
        string $codigoBarra,
        string $unidadMedida,
        float $precio,
        bool $exento,
        bool $tieneImpuestos,
        array $impuestos
    ) {
        $this->nombre = $nombre;
        $this->codigoBarra = $codigoBarra;
        $this->unidadMedida = $unidadMedida;
        $this->precio = $precio;
        $this->exento = $exento;
        $this->tieneImpuestos = $tieneImpuestos;
        $this->impuestos = $impuestos;
    }
}
