<?php

namespace SDKSimpleFactura\Models\Request;

class NuevoReceptorExternoRequest
{
    /**
     * @var string
     */
    public string $rut;

    /**
     * @var string
     */
    public string $razonSocial;

    /**
     * @var string
     */
    public string $giro;

    /**
     * @var string
     */
    public string $dirPart;

    /**
     * @var string
     */
    public string $dirFact;

    /**
     * @var string
     */
    public string $correoPar;

    /**
     * @var string
     */
    public string $correoFact;

    /**
     * @var string
     */
    public string $ciudad;

    /**
     * @var string
     */
    public string $comuna;

    /**
     * Constructor
     *
     * @param string $rut
     * @param string $razonSocial
     * @param string $giro
     * @param string $dirPart
     * @param string $dirFact
     * @param string $correoPar
     * @param string $correoFact
     * @param string $ciudad
     * @param string $comuna
     */
    public function __construct(
        string $rut,
        string $razonSocial,
        string $giro,
        string $dirPart,
        string $dirFact,
        string $correoPar,
        string $correoFact,
        string $ciudad,
        string $comuna
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
