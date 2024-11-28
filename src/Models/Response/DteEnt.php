<?php

namespace SDKSimpleFactura\Models\Response;

use SDKSimpleFactura\Models\Facturacion\DetalleDte;

class DteEnt
{
    public ?string $ambiente;
    public ?string $folioReutilizado;
    public ?string $importado;
    public int $codigoSii;
    public ?string $tipoDte;
    public ?string $estadoAcuse;
    public ?string $estadoSII;
    public ?string $estado;
    public ?string $fechaDte;
    public ?string $fechaCreacion;
    public ?string $fechaEmision;
    public ?string $fechaRecepcionSII;
    public ?int $folio;
    public ?string $razonSocialReceptor;
    public ?string $rutReceptor;
    public ?string $razonSocialProveedor;
    public ?string $rutProveedor;
    public ?int $trackId;
    public ?float $neto;
    public ?float $exento;
    public ?float $iva;
    public ?float $ivaTerceros;
    public ?float $ivaPropio;
    public ?float $totalImpuestosAdicionales;
    public ?float $montoNoFacturable;
    public ?string $formaPago;
    public ?float $total;
    /** @var DetalleDte[] */
    public ?array $detalles;
    
    public ?array $descuentosRecargosGlobales;
    /** @var ReferenciaDte[] */
    public ?array $referencias;
    public ?array $impuestos;

    public function __construct(
        ?string $ambiente = null,
        ?string $folioReutilizado = null,
        ?string $importado = null,
        int $codigoSii = 0,
        ?string $tipoDte = null,
        ?string $estadoAcuse = null,
        ?string $estadoSII = null,
        ?string $estado = null,
        ?string $fechaDte = null,
        ?string $fechaCreacion = null,
        ?string $fechaEmision = null,
        ?string $fechaRecepcionSII = null,
        ?int $folio = null,
        ?string $razonSocialReceptor = null,
        ?string $rutReceptor = null,
        ?string $razonSocialProveedor = null,
        ?string $rutProveedor = null,
        ?int $trackId = null,
        ?float $neto = null,
        ?float $exento = null,
        ?float $iva = null,
        ?float $ivaTerceros = null,
        ?float $ivaPropio = null,
        ?float $totalImpuestosAdicionales = null,
        ?float $montoNoFacturable = null,
        ?string $formaPago = null,
        ?float $total = null,
       ?array $detalles = [],
       ?array $descuentosRecargosGlobales = [],
       ?array $referencias = [],
       ?array $impuestos = []
    ) {
        $this->ambiente = $ambiente;
        $this->folioReutilizado = $folioReutilizado;
        $this->importado = $importado;
        $this->codigoSii = $codigoSii;
        $this->tipoDte = $tipoDte;
        $this->estadoAcuse = $estadoAcuse;
        $this->estadoSII = $estadoSII;
        $this->estado = $estado;
        $this->fechaDte = $fechaDte;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaEmision = $fechaEmision;
        $this->fechaRecepcionSII = $fechaRecepcionSII;
        $this->folio = $folio;
        $this->razonSocialReceptor = $razonSocialReceptor;
        $this->rutReceptor = $rutReceptor;
        $this->razonSocialProveedor = $razonSocialProveedor;
        $this->rutProveedor = $rutProveedor;
        $this->trackId = $trackId;
        $this->neto = $neto;
        $this->exento = $exento;
        $this->iva = $iva;
        $this->ivaTerceros = $ivaTerceros;
        $this->ivaPropio = $ivaPropio;
        $this->totalImpuestosAdicionales = $totalImpuestosAdicionales;
        $this->montoNoFacturable = $montoNoFacturable;
        $this->formaPago = $formaPago;
        $this->total = $total;
        $this->detalles = $detalles;
        $this->descuentosRecargosGlobales = $descuentosRecargosGlobales;
        $this->referencias = $referencias;
        $this->impuestos = $impuestos;
    }
}

