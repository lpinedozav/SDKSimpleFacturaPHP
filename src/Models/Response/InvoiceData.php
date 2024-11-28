<?php

namespace SDKSimpleFactura\Models\Response;

class InvoiceData
{
    public int $tipoDTE;
    public string $rutEmisor;
    public string $rutReceptor;
    public int $folio;
    public string $fechaEmision;
    public float $total;

    // Constructor opcional para inicializar las propiedades
    public function __construct(
        int $tipoDTE,
        string $rutEmisor,
        string $rutReceptor,
        int $folio,
        string $fechaEmision,
        float $total
    ) {
        $this->tipoDTE = $tipoDTE;
        $this->rutEmisor = $rutEmisor;
        $this->rutReceptor = $rutReceptor;
        $this->folio = $folio;
        $this->fechaEmision = $fechaEmision;
        $this->total = $total;
    }
}
