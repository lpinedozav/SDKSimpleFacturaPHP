<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\Paises;

class Extranjero
{
    /**
     * Número identificador del receptor extranjero.
     * @var string|null
     */
    public ?string $NumId;

    /**
     * Nacionalidad del receptor extranjero Enum.
     * @var Paises|null
     */
    public ?Paises $Nacionalidad;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $NumId = null,
        ?Paises $Nacionalidad = Paises::NotSet
    ) {
        $this->NumId = $NumId;
        $this->Nacionalidad = $Nacionalidad;
    }
}
