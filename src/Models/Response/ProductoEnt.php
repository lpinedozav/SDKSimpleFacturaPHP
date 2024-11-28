<?php

namespace SDKSimpleFactura\Models\Response;

use Ramsey\Uuid\Uuid;

class ProductoEnt
{
    /**
     * ID del producto.
     * @var string
     */
    public string $ProductoId;

    /**
     * Código de barras del producto.
     * @var string|null
     */
    public ?string $CodigoBarra = null;

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
     * Indica si el producto está activo.
     * @var bool
     */
    public bool $Activo;

    /**
     * ID del emisor.
     * @var string
     */
    public string $EmisorId;

    /**
     * ID de la sucursal.
     * @var string
     */
    public string $SucursalId;

    /**
     * Unidad de medida del producto.
     * @var string|null
     */
    public ?string $UnidadMedida = null;

    /**
     * Lista de impuestos aplicables al producto.
     * @var ImpuestoEnt[]
     */
    public array $Impuestos;

    /**
     * Obtiene el nombre de la categoría del producto.
     * @return string
     */
    public function getNombreCategoria(): string
    {
        return "Sin Categoría";
    }

    /**
     * Obtiene el nombre de la marca del producto.
     * @return string
     */
    public function getNombreMarca(): string
    {
        return "Sin Marca";
    }

    /**
     * Obtiene el stock del producto.
     * @return int
     */
    public function getStock(): int
    {
        return 50;
    }

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->ProductoId = Uuid::uuid4()->toString();
        $this->Nombre = '';
        $this->Precio = 0.0;
        $this->Exento = false;
        $this->Activo = false;
        $this->EmisorId = Uuid::uuid4()->toString();
        $this->SucursalId = Uuid::uuid4()->toString();
        $this->Impuestos = [];
    }
}
