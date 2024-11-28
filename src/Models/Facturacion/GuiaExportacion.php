<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;
use SDKSimpleFactura\Enum\CodigoTraslado;

class GuiaExportacion
{
    /**
     * Código de traslado Enum.
     * @var string
     */
    public ?CodigoTraslado $CdgTraslado;

    /**
     * Folio de autorización del SII.
     * @var int
     */
    public ?int $FolioAut;

    /**
     * Fecha de autorización en formato (AAAA-MM-DD).
     * @var DateTime
     */
    private ?DateTime $FchAut;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?CodigoTraslado $CdgTraslado = null,
        ?int $FolioAut = null,
        ?DateTime $FchAut = null

    ) {
        $this->CdgTraslado = $CdgTraslado;
        $this->FolioAut = $FolioAut;
        $this->FchAut = $FchAut;
    }


}
