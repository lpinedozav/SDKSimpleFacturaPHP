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
    public ?string $direccion = null;

    /**
     * Razón social del emisor.
     * @var string|null
     */
    public ?string $razonSocial = null;

    public function __construct(
        ?string $rutEmisor = null,
        ?string $direccion = null,
        ?string $razonSocial = null
    ) {
        $this->rutEmisor = $rutEmisor;
        $this->direccion = $direccion;
        $this->razonSocial = $razonSocial;
    }
}