<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;
use SDKSimpleFactura\Enum\IndicadorFacturacionExencion;
use SDKSimpleFactura\Enum\TipoImpuesto;


class Detalle
{
    /**
     * Número secuencial de línea.
     * @var int
     */
    public ?int $NroLinDet;


    /** @var CodigoItem[] */
    public ?array $CdgItem = [];
    /**
     * Indicador de exención/facturación Enum.
     * @var IndicadorFacturacionExencion
     */
    public ?IndicadorFacturacionExencion $IndExe;

    /**
     * Retenedor.
     * @var Retenedor|null
     */
    public ?Retenedor $Retenedor = null;

    /**
     * Nombre del producto o servicio.
     * @var string
     */
    public string $NmbItem;

    /**
     * Descripción del ítem.
     * @var string|null
     */
    public ?string $DscItem = null;

    /**
     * Cantidad para la unidad de medida de referencia.
     * @var float
     */
    public ?float $QtyRef = 0.0;

    /**
     * Unidad de medida de referencia.
     * @var string
     */
    public ?string $UnmdRef;

    /**
     * Precio unitario de referencia para unidad de medida de referencia.
     * @var float
     */
    public ?float $PrcRef = 0.0;

    /**
     * Cantidad del ítem.
     * @var float
     */
    public ?float $QtyItem = 0.0;


    /** @var SubCantidad[] */
    public ?array $Subcantidad = [];

    /**
     * Fecha de elaboración del ítem (AAAA-MM-DD).
     * @var DateTime
     */
    public ?DateTime $FchElabor;

    /**
     * Fecha de vencimiento del ítem (AAAA-MM-DD).
     * @var DateTime
     */
    public ?DateTime $FchVencim;

    /**
     * Unidad de medida.
     * @var string
     */
    public ?string $UnmdItem;

    /**
     * Precio unitario del ítem.
     * @var float
     */
    public ?float $PrcItem = 0.0;

    /**
     * OtramonedaDetalle.
     * @var OtraMonedaDetalle|null
     */
    public ?OtraMonedaDetalle $OtrMnda = null;

    /**
     * Porcentaje de descuento.
     * @var float
     */
    public ?float $DescuentoPct = 0.0;

    /**
     * Monto del descuento.
     * @var int
     */
    public ?int $DescuentoMonto;


    /**
     * SubDescuento.
     * @var SubDescuento|null
     */
    public ?SubDescuento $SubDscto = null;

    /**
     * Porcentaje de recargo.
     * @var float
     */
    public ?float $RecargoPct = 0.0;

    /**
     * Monto de recargo.
     * @var int
     */
    public ?int $RecargoMonto;


    /**
     * SubRecargo.
     * @var SubRecargo|null
     */
    public ?SubRecargo $SubRecargo = null;


    /** @var TipoImpuesto[] */
    public ?array $CodImpAdic = [];

    /**
     * Monto por línea de detalle.
     * @var int
     */
    public ?int $MontoItem;
    public function __construct(
        ?int $NroLinDet = null,
        ?array $CdgItem = null,
        ?IndicadorFacturacionExencion $IndExe = null,
        ?Retenedor $Retenedor = null,
        string $NmbItem = '',
        ?string $DscItem = null,
        ?float $QtyRef = 0.0,
        ?string $UnmdRef = null,
        ?float $PrcRef = 0.0,
        ?float $QtyItem = 0.0,
        ?array $Subcantidad = null,
        ?DateTime $FchElabor = null,
        ?DateTime $FchVencim = null,
        ?string $UnmdItem = null,
        ?float $PrcItem = 0.0,
        ?OtraMonedaDetalle $OtrMnda = null,
        ?float $DescuentoPct = 0.0,
        ?int $DescuentoMonto = null,
        ?SubDescuento $SubDscto = null,
        ?float $RecargoPct = 0.0,
        ?int $RecargoMonto = null,
        ?SubRecargo $SubRecargo = null,
        ?array $CodImpAdic = null,
        ?int $MontoItem = null
    ) {
        $this->NroLinDet = $NroLinDet;
        $this->CdgItem = $CdgItem;
        $this->IndExe = $IndExe;
        $this->Retenedor = $Retenedor;
        $this->NmbItem = $NmbItem;
        $this->DscItem = $DscItem;
        $this->QtyRef = $QtyRef;
        $this->UnmdRef = $UnmdRef;
        $this->PrcRef = $PrcRef;
        $this->QtyItem = $QtyItem;
        $this->Subcantidad = $Subcantidad;
        $this->FchElabor = $FchElabor;
        $this->FchVencim = $FchVencim;
        $this->UnmdItem = $UnmdItem;
        $this->PrcItem = $PrcItem;
        $this->OtrMnda = $OtrMnda;
        $this->DescuentoPct = $DescuentoPct;
        $this->DescuentoMonto = $DescuentoMonto;
        $this->SubDscto = $SubDscto;
        $this->RecargoPct = $RecargoPct;
        $this->RecargoMonto = $RecargoMonto;
        $this->SubRecargo = $SubRecargo;
        $this->CodImpAdic = $CodImpAdic;
        $this->MontoItem = $MontoItem;
    }
}
