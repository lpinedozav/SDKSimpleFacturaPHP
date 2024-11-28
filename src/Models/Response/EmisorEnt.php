<?php

namespace SDKSimpleFactura\Models\Response;

class EmisorEnt
{
    /**
     * RUT del emisor.
     * @var string|null
     */
    public ?string $rutEmisor = null;

    /**
     * Dirección del emisor.
     * @var string|null
     */
    public ?string $Direccion = null;

    /**
     * Razón social del emisor.
     * @var string|null
     */
    public ?string $RazonSocial = null;
}
