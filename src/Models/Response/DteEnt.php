<?php

namespace SDKSimpleFactura\Models\Response;

use SDKSimpleFactura\Models\Facturacion\DetalleDte;

class DteEnt
{
    public ?string $ambiente = null;
    public ?string $folioReutilizado = null;
    public ?string $importado = null;
    public int $codigoSii;
    public ?string $tipoDte = null;
    public ?string $estadoAcuse = null;
    public ?string $estadoSII = null;
    public ?string $estado = null;
    public ?string $fechaDte = null;
    public ?string $fechaCreacion = null;
    public ?string $fechaEmision = null;
    public ?string $fechaRecepcionSII = null;
    public ?int $folio = null;
    public ?string $razonSocialReceptor = null;
    public ?string $rutReceptor = null;
    public ?string $razonSocialProveedor = null;
    public ?string $rutProveedor = null;
    public ?int $trackId = null;
    public ?float $neto = null;
    public ?float $exento = null;
    public ?float $iva = null;
    public ?float $ivaTerceros = null;
    public ?float $ivaPropio = null;
    public ?float $totalImpuestosAdicionales = null;
    public ?float $montoNoFacturable = null;
    public ?string $formaPago = null;
    public ?float $total = null;
    /** @var DetalleDte[] */
    public array $detalles = [];
    public array $descuentosRecargosGlobales = [];
    /** @var ReferenciaDte[] */
    public array $referencias = [];
    public array $impuestos = [];
}
