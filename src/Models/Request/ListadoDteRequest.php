<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\TipoSalida;
use SDKSimpleFactura\Models\Request\Credenciales;

class ListaDteRequest
{
    /**
     * @var Credenciales
     */
    public Credenciales $credenciales;

    /**
     * @var AmbienteEnum
     */
    public Ambiente $ambiente;

    /**
     * @var ?int
     */
    public ?int $folio;

    /**
     * @var ?DTEType
     */
    public ?DTEType $codigoTipoDte;

    /**
     * @var ?\DateTime
     */
    public ?\DateTime $desde;

    /**
     * @var ?\DateTime
     */
    public ?\DateTime $hasta;

    /**
     * @var TipoSalida
     */
    public TipoSalida $salida;

    /**
     * @var ?string
     */
    public ?string $rutEmisor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credenciales = new Credenciales();
        $this->ambiente = Ambiente::Certificacion; // Suponiendo que AmbienteEnum tiene una constante NotSet
        $this->folio = null;
        $this->codigoTipoDte = null;
        $this->desde = null;
        $this->hasta = null;
        $this->salida = TipoSalida::Base64; // Suponiendo que TipoSalida tiene una constante NotSet
        $this->rutEmisor = null;
    }
}
