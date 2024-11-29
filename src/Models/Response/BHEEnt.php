<?php

namespace SDKSimpleFactura\Models\Response;

class BHEEnt
{
    public ?int $folio;
    public ?string $fechaEmision;
    public ?string $codigoBarra;
    /**
     * Información del emisor.
     * @var EmisorEnt|null
     */
    public ?EmisorEnt $emisor;

    /**
     * Información del receptor.
     * @var ReceptorEnt|null
     */
    public ?ReceptorEnt $receptor;

    /**
     * Totales del documento.
     * @var TotalesEnt|null
     */
    public ?TotalesEnt $totales;
    public ?string $estado;
    public ?string $descripcionAnulacion;

    public function __construct(
        ?int $folio = null,
        ?string $fechaEmision = null,
        ?string $codigoBarra = null,
        ?EmisorEnt $emisor = null,
        ?ReceptorEnt $receptor = null,
        ?TotalesEnt $totales = null,
        ?string $estado = null,
        ?string $descripcionAnulacion = null
    ) {
        $this->folio = $folio;
        $this->fechaEmision = $fechaEmision;
        $this->codigoBarra = $codigoBarra;
        $this->emisor = $emisor;
        $this->receptor = $receptor;
        $this->totales = $totales;
        $this->estado = $estado;
        $this->descripcionAnulacion = $descripcionAnulacion;
    }
}