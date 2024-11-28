<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Chofer
{
    /**
     * Rut del chofer.
     * @var string
     */
    public ?string $RUTChofer;

    /**
     * Nombre del chofer.
     * @var string
     */
    private ?string $NombreChofer;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $RUTChofer = null,
        ?string $NombreChofer = null
    ) {
        $this->RUTChofer = $RUTChofer;
        $this->NombreChofer = $NombreChofer;
    }


}
