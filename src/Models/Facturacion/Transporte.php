<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Transporte
{
    /**
     * Patente del vehículo que transporta los bienes.
     * @var string|null
     */
    public ?string $Patente = null;

    /**
     * Rut del transportista.
     * @var string|null
     */
    public ?string $RUTTrans = null;

    /**
     * Chofer del transporte.
     * @var Chofer|null
     */
    public ?Chofer $Chofer = null;

    /**
     * Dirección de destino.
     * @var string|null
     */
    public ?string $DirDest = null;

    /**
     * Comuna de destino.
     * @var string|null
     */
    public ?string $CmnaDest = null;

    /**
     * Ciudad de destino.
     * @var string|null
     */
    public ?string $CiudadDest = null;

    /**
     * Aduana (Documentos de exportación y guías de despacho).
     * @var Aduana|null
     */
    public ?Aduana $Aduana = null;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $Patente = null,
        ?string $RUTTrans = null,
        ?Chofer $Chofer = null,
        ?string $DirDest = null,
        ?string $CmnaDest = null,
        ?string $CiudadDest = null,
        ?Aduana $Aduana = null
    ) {
        $this->Patente = $Patente;
        $this->RUTTrans = $RUTTrans;
        $this->Chofer = $Chofer;
        $this->DirDest = $DirDest;
        $this->CmnaDest = $CmnaDest;
        $this->CiudadDest = $CiudadDest;
        $this->Aduana = $Aduana;
    }
}
