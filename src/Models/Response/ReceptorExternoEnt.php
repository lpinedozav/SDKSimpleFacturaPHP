<?php
namespace SDKSimpleFactura\Models\Response;

class ReceptorExternoEnt
{
    /**
     * ID del receptor.
     * @var string
     */
    public string $ReceptorId;

    /**
     * ID del emisor.
     * @var string
     */
    public string $EmisorId;

    /**
     * RUT del receptor (sin dígito verificador).
     * @var int
     */
    public int $Rut;

    /**
     * Dígito verificador del RUT.
     * @var string
     */
    public string $Dv;

    /**
     * RUT formateado.
     * @var string
     */
    public string $RutFormateado;

    /**
     * Razón social del receptor.
     * @var string
     */
    public string $RazonSocial;

    /**
     * Nombre de fantasía del receptor.
     * @var string
     */
    public string $NombreFantasia;

    /**
     * Giro del receptor.
     * @var string
     */
    public string $Giro;

    /**
     * Dirección particular del receptor.
     * @var string
     */
    public string $DirPart;

    /**
     * Dirección de facturación del receptor.
     * @var string
     */
    public string $DirFact;

    /**
     * Correo electrónico particular del receptor.
     * @var string
     */
    public string $CorreoPar;

    /**
     * Correo electrónico para facturación del receptor.
     * @var string
     */
    public string $CorreoFact;

    /**
     * Ciudad del receptor.
     * @var string
     */
    public string $Ciudad;

    /**
     * Comuna del receptor.
     * @var string
     */
    public string $Comuna;

    /**
     * Indica si el receptor está activo.
     * @var bool
     */
    public bool $Activo;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->ReceptorId = \Ramsey\Uuid\Uuid::uuid4()->toString(); // Requiere "ramsey/uuid"
        $this->EmisorId = \Ramsey\Uuid\Uuid::uuid4()->toString(); // Requiere "ramsey/uuid"
        $this->Rut = 0;
        $this->Dv = '';
        $this->RutFormateado = '';
        $this->RazonSocial = '';
        $this->NombreFantasia = '';
        $this->Giro = '';
        $this->DirPart = '';
        $this->DirFact = '';
        $this->CorreoPar = '';
        $this->CorreoFact = '';
        $this->Ciudad = '';
        $this->Comuna = '';
        $this->Activo = true;
    }
}
