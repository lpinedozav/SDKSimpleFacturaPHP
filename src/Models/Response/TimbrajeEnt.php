<?php

namespace SDKSimpleFactura\Models\Response;

use DateTime;
use Ramsey\Uuid\Uuid;

class TimbrajeEnt
{
    /**
     * ID del timbraje.
     * @var string
     */
    public string $TimbrajeId;

    /**
     * ID del tipo de DTE.
     * @var string
     */
    public string $TipoDteId;

    /**
     * ID de la sucursal.
     * @var string
     */
    public string $SucursalId;

    /**
     * Código del SII.
     * @var int
     */
    public int $CodigoSii;

    /**
     * Fecha de ingreso.
     * @var DateTime
     */
    public DateTime $FechaIngreso;

    /**
     * Fecha del CAF.
     * @var DateTime|null
     */
    public ?DateTime $FechaCaf = null;

    /**
     * Folio inicial.
     * @var int
     */
    public int $Desde;

    /**
     * Folio final.
     * @var int
     */
    public int $Hasta;

    /**
     * Indica si está activo.
     * @var bool
     */
    public bool $Activo;

    /**
     * ID del emisor.
     * @var string
     */
    public string $EmisorId;

    /**
     * ID del usuario.
     * @var string
     */
    public string $UsuarioId;

    /**
     * Fecha de vencimiento.
     * @var DateTime
     */
    public DateTime $FechaVencimiento;

    /**
     * XML del timbraje.
     * @var string
     */
    public string $Xml;

    /**
     * Nombre de la sucursal.
     * @var string
     */
    public string $NombreSucursal;

    /**
     * Tipo de DTE.
     * @var string
     */
    public string $TipoDte;

    /**
     * Folios disponibles.
     * @var int
     */
    public int $FoliosDisponibles;

    /**
     * Folios sin usar.
     * @var int
     */
    public int $FoliosSinUsar;

    /**
     * Último folio emitido.
     * @var int
     */
    public int $UltimoFolioEmitido;

    /**
     * RUT del emisor.
     * @var string
     */
    public string $RutEmisor;

    /**
     * Ambiente.
     * @var int
     */
    public int $Ambiente;

    /**
     * Indica si se deben borrar folios bloqueados.
     * @var bool
     */
    public bool $BorrarFolioBloqueado;

    /**
     * Indica si está sincronizado.
     * @var bool
     */
    public bool $Sincronizado;

    /**
     * Fecha de la última sincronización.
     * @var DateTime|null
     */
    public ?DateTime $FechaUltimaSincronizacion = null;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TimbrajeId = Uuid::uuid4()->toString();
        $this->TipoDteId = Uuid::uuid4()->toString();
        $this->SucursalId = Uuid::uuid4()->toString();
        $this->CodigoSii = 0;
        $this->FechaIngreso = date('Y-m-d H:i:s');
        $this->Desde = 0;
        $this->Hasta = 0;
        $this->Activo = false;
        $this->EmisorId = Uuid::uuid4()->toString();
        $this->UsuarioId = Uuid::uuid4()->toString();
        $this->FechaVencimiento = date('Y-m-d H:i:s');
        $this->Xml = '';
        $this->NombreSucursal = '';
        $this->TipoDte = '';
        $this->FoliosDisponibles = 0;
        $this->FoliosSinUsar = 0;
        $this->UltimoFolioEmitido = 0;
        $this->RutEmisor = '';
        $this->Ambiente = 0;
        $this->BorrarFolioBloqueado = false;
        $this->Sincronizado = false;
    }
}
