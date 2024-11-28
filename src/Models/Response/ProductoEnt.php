<?php

namespace SDKSimpleFactura\Models\Response;

use Ramsey\Uuid\Uuid;

class ProductoEnt
{
    public ?string $productoId;
    public ?string $codigoBarra;
    public ?string $nombre;
    public ?float $precio;
    public ?bool $exento;
    public ?bool $activo;
    public ?string $emisorId;
    public ?string $sucursalId;
    public ?string $unidadMedida;
    public ?string $nombreCategoria;
    public ?string $nombreMarca;
    public ?int $stock;

    /**
     * @var ImpuestoEnt[]
     */
    public ?array $impuestos;

    public function __construct(
        ?string $productoId = null,
        ?string $codigoBarra = null,
        ?string $nombre = null,
        ?float $precio = null,
        ?bool $exento = null,
        ?bool $activo = null,
        ?string $emisorId = null,
        ?string $sucursalId = null,
        ?string $unidadMedida = null,
        ?array $impuestos = [],
        ?string $nombreCategoria = null,
        ?string $nombreMarca = null,
        ?int $stock = null
    ) {
        $this->productoId = $productoId;
        $this->codigoBarra = $codigoBarra;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->exento = $exento;
        $this->activo = $activo;
        $this->emisorId = $emisorId;
        $this->sucursalId = $sucursalId;
        $this->unidadMedida = $unidadMedida;
        $this->impuestos = $impuestos;
        $this->nombreCategoria = $nombreCategoria;
        $this->nombreMarca = $nombreMarca;
        $this->stock = $stock;
    }
}
