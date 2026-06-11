<?php

namespace SDKSimpleFactura\Models\Request;

use DateTime;
use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;
use SDKSimpleFactura\Enum\TipoSalida;
use SDKSimpleFactura\Models\Request\Credenciales;

class ListadoDteRequest
{
    /**
     * @var Credenciales
     */
    public ?Credenciales $credenciales;

    /**
     * @var Ambiente
     */
    public ?Ambiente $ambiente;

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
    public ?DateTime $desde;

    /**
     * @var ?\DateTime
     */
    public ?DateTime $hasta;

    /**
     * @var TipoSalida
     */
    public ?TipoSalida $salida;

    /**
     * @var ?string
     */
    public ?string $rutEmisor;

    /**
     * @var ?string
     */
    public ?string $rutReceptor;

    /**
     * Filtra documentos según si han sido cedidos o no (opcional).
     * @var ?bool
     */
    public ?bool $cedida;

    /**
     * Constructor
     */
    public function __construct(
        ?Credenciales $credenciales = null,
        ?Ambiente $ambiente = null,
        ?int $folio = null,
        ?DTEType $codigoTipoDte = null,
        ?DateTime $desde = null,
        ?DateTime $hasta = null,
        ?TipoSalida $salida = null,
        ?string $rutEmisor = null,
        ?string $rutReceptor = null,
        ?bool $cedida = null
    )
    {
        $this->credenciales = $credenciales;
        $this->ambiente = $ambiente;
        $this->folio = $folio;
        $this->codigoTipoDte = $codigoTipoDte;
        $this->desde = $desde;
        $this->hasta = $hasta;
        $this->salida = $salida;
        $this->rutEmisor = $rutEmisor;
        $this->rutReceptor = $rutReceptor;
        $this->cedida = $cedida;
    }

}
