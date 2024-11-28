<?php

namespace SDKSimpleFactura\Models\Response;

class InvoiceData
{
    public ?int $tipoDTE;
    public ?string $rutEmisor;
    public ?string $rutReceptor;
    public ?int $folio;
    public ?string $fechaEmision;
    public ?float $total;

    // Constructor opcional para inicializar las propiedades
    public function __construct(
        ?int $tipoDTE = null,
        ?string $rutEmisor = null,
        ?string $rutReceptor = null,
        ?int $folio = null,
        ?string $fechaEmision = null,
        ?float $total = null
    ) {
        $this->tipoDTE = $tipoDTE;
        $this->rutEmisor = $rutEmisor;
        $this->rutReceptor = $rutReceptor;
        $this->folio = $folio;
        $this->fechaEmision = $fechaEmision;
        $this->total = $total;
    }
}
