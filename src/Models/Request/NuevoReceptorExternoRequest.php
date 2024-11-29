<?php

namespace SDKSimpleFactura\Models\Request;

class NuevoReceptorExternoRequest
{
    /**
     * @var string
     */
    public ?string $rut;

    /**
     * @var string
     */
    public ?string $razonSocial;

    /**
     * @var string
     */
    public ?string $giro;

    /**
     * @var string
     */
    public ?string $dirPart;

    /**
     * @var string
     */
    public ?string $dirFact;

    /**
     * @var string
     */
    public ?string $correoPar;

    /**
     * @var string
     */
    public ?string $correoFact;

    /**
     * @var string
     */
    public ?string $ciudad;

    /**
     * @var string
     */
    public ?string $comuna;

   
    public function __construct(
        ?string $rut = null,
        ?string $razonSocial = null,
        ?string $giro = null,
        ?string $dirPart = null,
        ?string $dirFact = null,
        ?string $correoPar = null,
        ?string $correoFact = null,
        ?string $ciudad = null,
        ?string $comuna = null
    ) {
        $this->rut = $rut;
        $this->razonSocial = $razonSocial;
        $this->giro = $giro;
        $this->dirPart = $dirPart;
        $this->dirFact = $dirFact;
        $this->correoPar = $correoPar;
        $this->correoFact = $correoFact;
        $this->ciudad = $ciudad;
        $this->comuna = $comuna;
    }
}
