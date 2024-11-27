<?php

namespace SDKSimpleFactura\Models\Response;

use DateTime;
use SDKSimpleFactura\Enum\DTEType;

class DetalleEnt
{
    public ?string $nombre = null;
    public ?string $descripcion = null;
    public ?string $exento = null;
    public ?float $precio = null;
    public ?float $cantidad = null;
    public ?float $totalImpuestos = null;
    public ?float $total = null;
    public ?DateTime $fecha = null;
    public ?DTEType $codigoSii = null;
    public ?string $tipoDTE = null;
    public ?int $cantidadEmitidos = null;
    public ?int $cantidadAnulados = null;
    public ?float $totalNeto = null;
    public ?float $totalExento = null;
    public ?float $totalIva = null;
}
