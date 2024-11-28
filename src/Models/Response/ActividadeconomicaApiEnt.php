<?php

namespace SDKSimpleFactura\Models\Response;

class ActividadeconomicaApiEnt
{
    /**
     * Código de la actividad económica.
     * @var int
     */
    public int $Codigo;

    /**
     * Descripción de la actividad económica.
     * @var string
     */
    public string $Descripcion;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->Codigo = 0;
        $this->Descripcion = '';
    }
}
