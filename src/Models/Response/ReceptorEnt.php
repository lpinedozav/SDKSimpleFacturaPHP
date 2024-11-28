<?php

namespace SDKSimpleFactura\Models\Response;

class ReceptorEnt
{
    /**
     * RUT del receptor.
     * @var string|null
     */
    public ?string $Rut = null;

    /**
     * Comuna del receptor.
     * @var string|null
     */
    public ?string $Comuna = null;

    /**
     * Nombre del receptor.
     * @var string|null
     */
    public ?string $Nombre = null;

    /**
     * Dirección del receptor.
     * @var string|null
     */
    public ?string $Direccion = null;

    /**
     * Región del receptor.
     * @var string|null
     */
    public ?string $Region = null;
}
