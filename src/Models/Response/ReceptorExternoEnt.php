<?php
namespace SDKSimpleFactura\Models\Response;

class ReceptorExternoEnt
{
    /**
     * ID del receptor.
     * @var string
     */
    public ?string $receptorId;

    /**
     * ID del emisor.
     * @var string
     */
    public ?string $emisorId;

    /**
     * RUT del receptor (sin dígito verificador).
     * @var int
     */
    public ?int $rut;

    /**
     * Dígito verificador del RUT.
     * @var string
     */
    public ?string $dv;

    /**
     * RUT formateado.
     * @var string
     */
    public ?string $rutFormateado;

    /**
     * Razón social del receptor.
     * @var ?string
     */
    public ?string $razonSocial;

    /**
     * Nombre de fantasía del receptor.
     * @var string
     */
    public ?string $nombreFantasia;

    /**
     * Giro del receptor.
     * @var string
     */
    public ?string $giro;

    /**
     * Dirección particular del receptor.
     * @var string
     */
    public ?string $dirPart;

    /**
     * Dirección de facturación del receptor.
     * @var string
     */
    public ?string $dirFact;

    /**
     * Correo electrónico particular del receptor.
     * @var string
     */
    public ?string $correoPar;

    /**
     * Correo electrónico para facturación del receptor.
     * @var string
     */
    public ?string $correoFact;

    /**
     * Ciudad del receptor.
     * @var string
     */
    public ?string $ciudad;

    /**
     * Comuna del receptor.
     * @var string
     */
    public ?string $comuna;

    /**
     * Indica si el receptor está activo.
     * @var bool
     */
    public ?bool $activo;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $receptorId = null,
        ?string $emisorId = null,
        ?int $rut = null,
        ?string $dv = null,
        ?string $rutFormateado = null,
        ?string $razonSocial = null,
        ?string $nombreFantasia = null,
        ?string $giro = null,
        ?string $dirFact = null,
        ?string $correoPar = null,
        ?string $correoFact = null,
        ?string $ciudad = null,
        ?string $comuna = null,
        ?bool $activo = null
    )
    {
        $this->receptorId = $receptorId;
        $this->emisorId = $emisorId;
        $this->rut = $rut;
        $this->dv = $dv;
        $this->rutFormateado = $rutFormateado;
        $this->razonSocial = $razonSocial;
        $this->nombreFantasia = $nombreFantasia;
        $this->giro = $giro;
        $this->dirFact = $dirFact;
        $this->correoPar = $correoPar;
        $this->correoFact = $correoFact;
        $this->ciudad = $ciudad;
        $this->comuna = $comuna;
        $this->activo = $activo;

    }
}
