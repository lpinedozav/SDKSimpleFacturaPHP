<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Emisor
{
    /**
     * Rut del emisor del DTE.
     * @var string
     */
    public ?string $RUTEmisor;

    /**
     * Nombre o razón social del Emisor.
     * @var string|null
     */
    public ?string $RznSoc;

    /**
     * Razón social para boletas.
     * @var string|null
     */
    public ?string $RznSocEmisor;

    /**
     * Giro del emisor.
     * @var string|null
     */
    public ?string $GiroEmis;

    /**
     * Giro del emisor.
     * @var string|null
     */
    public ?string $GiroEmisor;

    /**
     * Teléfonos del emisor.
     * @var array
     */
    public ?array $Telefono = [];

    /**
     * Correo electrónico de contacto del emisor.
     * @var string|null
     */
    public ?string $CorreoEmisor;

    /**
     * Códigos de actividad económica.
     * @var array
     */
    public ?array $Acteco = [];

    /**
     * Emisor de una Guía de despacho para exportación.
     * @var GuiaExportacion|null
     */
    public ?GuiaExportacion $GuiaExport;

    /**
     * Sucursal que emite el DTE.
     * @var string
     */
    public ?string $Sucursal;

    /**
     * Código SII de la sucursal.
     * @var int
     */
    public ?int $CdgSIISucur;

    /**
     * Dirección de origen.
     * @var string
     */
    public ?string $DirOrigen;

    /**
     * Comuna de origen.
     * @var string
     */
    public ?string $CmnaOrigen;

    /**
     * Ciudad de origen.
     * @var string
     */
    public ?string $CiudadOrigen;

    /**
     * Código del vendedor.
     * @var string
     */
    public ?string $CdgVendedor;

    /**
     * Identificador adicional del emisor.
     * @var string
     */
    public ?string $IdAdicEmisor;
    public function __construct(
        ?string $RUTEmisor = null,
        ?string $RznSoc = null,
        ?string $RznSocEmisor = null,
        ?string $GiroEmis = null,
        ?string $GiroEmisor = null,
        ?array $Telefono = [],
        ?string $CorreoEmisor = null,
        ?array $Acteco = [],
        ?GuiaExportacion $GuiaExport = null,
        ?string $Sucursal = null,
        ?int $CdgSIISucur = null,
        ?string $DirOrigen = null,
        ?string $CmnaOrigen = null,
        ?string $CiudadOrigen = null,
        ?string $CdgVendedor = null,
        ?string $IdAdicEmisor = null
    ) {
        $this->RUTEmisor = $RUTEmisor;
        $this->RznSoc = $RznSoc;
        $this->RznSocEmisor = $RznSocEmisor;
        $this->GiroEmis = $GiroEmis;
        $this->GiroEmisor = $GiroEmisor;
        $this->Telefono = $Telefono;
        $this->CorreoEmisor = $CorreoEmisor;
        $this->Acteco = $Acteco;
        $this->GuiaExport = $GuiaExport;
        $this->Sucursal = $Sucursal;
        $this->CdgSIISucur = $CdgSIISucur;
        $this->DirOrigen = $DirOrigen;
        $this->CmnaOrigen = $CmnaOrigen;
        $this->CiudadOrigen = $CiudadOrigen;
        $this->CdgVendedor = $CdgVendedor;
        $this->IdAdicEmisor = $IdAdicEmisor;
    }
}
