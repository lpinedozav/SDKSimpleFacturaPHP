<?php

namespace SDKSimpleFactura\Models\Response;

class ProductoExternoEnt
{
    /**
     * ID del producto.
     * @var string
     */
    public string $ProductoId;

    /**
     * Nombre del producto.
     * @var string
     */
    public string $Nombre;

    /**
     * Precio del producto.
     * @var float
     */
    public float $Precio;

    /**
     * Indica si el producto está exento de impuestos.
     * @var bool
     */
    public bool $Exento;

    /**
     * Lista de impuestos aplicados al producto.
     * @var ImpuestoProductoExternoEnt[]
     */
    public array $Impuestos;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->ProductoId = \Ramsey\Uuid\Uuid::uuid4()->toString(); // Requiere "ramsey/uuid"
        $this->Impuestos = [];
    }
}
