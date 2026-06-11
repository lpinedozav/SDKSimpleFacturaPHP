<?php

namespace SDKSimpleFactura\Models\Response;

class PeriodoSync
{
    public ?int $mes;
    public ?int $anio;

    public function __construct(?int $mes = null, ?int $anio = null)
    {
        $this->mes = $mes;
        $this->anio = $anio;
    }
}
