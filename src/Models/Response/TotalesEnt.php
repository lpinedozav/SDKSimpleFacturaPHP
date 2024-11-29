<?php

namespace SDKSimpleFactura\Models\Response;

class TotalesEnt
{
    public ?float $totalHonorarios;
    public ?float $bruto;
    public ?float $liquido;
    public ?float $pagado;
    public ?float $retenido;

    public function __construct(
        ?float $totalHonorarios = null,
        ?float $bruto = null,
        ?float $liquido = null,
        ?float $pagado = null,
        ?float $retenido = null
    ) {
        $this->totalHonorarios = $totalHonorarios;
        $this->bruto = $bruto;
        $this->liquido = $liquido;
        $this->pagado = $pagado;
        $this->retenido = $retenido;
    }
}