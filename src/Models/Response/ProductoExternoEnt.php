<?php

namespace SDKSimpleFactura\Models\Response;

use SDKSimpleFactura\Models\Response\ImpuestoProductoExternoEnt;

class ProductoExternoEnt
{
    /**
     * ID del producto.
     * @var string
     */
    public ?string $productoId;

    /**
     * Nombre del producto.
     * @var string
     */
    public ?string $nombre;

    /**
     * Precio del producto.
     * @var float
     */
    public ?float $precio;

    /**
     * Indica si el producto está exento de impuestos.
     * @var bool
     */
    public ?bool $exento;

    /**
     * Lista de impuestos aplicados al producto.
     * @var ImpuestoProductoExternoEnt[]
     */
    public ?array $impuestos;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $productoId = null,
        ?string $nombre = null,
        ?float $precio = null,
        ?bool $exento = null,
        ?array $impuestos = null
    ) {
        $this->productoId = $productoId;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->exento = $exento;
        $this->impuestos = $impuestos;
    }
}
