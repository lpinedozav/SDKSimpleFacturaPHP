<?php
namespace SDKSimpleFactura\Models\Response;

class BHEEnt
{
    /**
     * Folio del documento.
     * @var int|null
     */
    public ?int $Folio = null;

    /**
     * Fecha de emisión del documento.
     * @var string|null
     */
    public ?string $FechaEmision = null;

    /**
     * Código de barra del documento.
     * @var string|null
     */
    public ?string $CodigoBarra = null;

    /**
     * Información del emisor.
     * @var EmisorEnt|null
     */
    public ?EmisorEnt $Emisor = null;

    /**
     * Información del receptor.
     * @var ReceptorEnt|null
     */
    public ?ReceptorEnt $Receptor = null;

    /**
     * Totales del documento.
     * @var TotalesEnt|null
     */
    public ?TotalesEnt $Totales = null;

    /**
     * Estado del documento.
     * @var string|null
     */
    public ?string $Estado = null;

    /**
     * Descripción de la anulación, si aplica.
     * @var string|null
     */
    public ?string $DescripcionAnulacion = null;
}
