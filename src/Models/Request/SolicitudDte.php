<?php

namespace SDKSimpleFactura\Models\Request;

class SolicitudDte
{
    public ?Credenciales $credenciales;
    public ?DteReferenciadoExterno $dteReferenciadoExterno;

    /**
     * Título del pie de página para la representación impresa (opcional).
     * @var string
     */
    public ?string $tituloPiePagina;

    /**
     * Mensaje del pie de página para la representación impresa (opcional).
     * @var string
     */
    public ?string $mensaje;

    public function __construct(
        ?Credenciales $credenciales = null,
        ?DteReferenciadoExterno $dteReferenciadoExterno = null,
        ?string $tituloPiePagina = null,
        ?string $mensaje = null
    ) {
        $this->credenciales = $credenciales;
        $this->dteReferenciadoExterno = $dteReferenciadoExterno;
        $this->tituloPiePagina = $tituloPiePagina;
        $this->mensaje = $mensaje;
    }
}
