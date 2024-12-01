<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\IndicadorFacturacionExencion;
use SDKSimpleFactura\Enum\TipoImpuesto;

class DetalleExportacion
{
    /**
     * Número secuencial de línea.
     * De 1 a 60.
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
     * Solo para transacciones realizadas por agentes retenedores.
     * @var Retenedor|null
     */
    public ?Retenedor $Retenedor;

    /**
     * Nombre del producto o servicio.
     * @var string
     */
    public string $NmbItem;

    /**
     * Descripción del ítem.
     * @var string|null
     */
    public ?string $DscItem;

    /**
     * Cantidad para la unidad de medida de referencia.
     * @var float
     */
    public ?float $QtyRef;

    /**
     * Unidad de medida de referencia.
     * @var string
     */
    public ?string $UnmdRef;

    /**
     * Precio unitario de referencia.
     * @var float
     */
    public ?float $PrcRef;

    /**
     * Cantidad del ítem.
     * @var float
     */
    public ?float $QtyItem;

    /** @var SubCantidad[] */
    public ?array $Subcantidad = [];

    /**
     * Fecha de elaboración del ítem.
     * @var string|null
     */
    public ?string $FchElabor;

    /**
     * Fecha de vencimiento del ítem.
     * @var string|null
     */
    public ?string $FchVencim;

    /**
     * Unidad de medida.
     * @var string
     */
    public ?string $UnmdItem;

    /**
     * Precio unitario del ítem en pesos.
     * @var float
     */
    public ?float $PrcItem;

    /**
     * Precio del ítem en otra moneda.
     * @var OtraMonedaDetalle|null
     */
    public ?OtraMonedaDetalle $OtrMnda;

    /**
     * Porcentaje de descuento.
     * @var float
     */
    public ?float $DescuentoPct;

    /**
     * Monto del descuento.
     * @var int
     */
    public ?int $DescuentoMonto;

    /** @var SubDescuento[] */
    public ?array $SubDscto = [];

    /**
     * Porcentaje de recargo.
     * @var float
     */
    public ?float $RecargoPct;

    /**
     * Monto de recargo.
     * @var int
     */
    public ?int $RecargoMonto;


    /** @var SubRecargo[] */
    public ?array $SubRecargo = [];

    /** @var TipoImpuesto[]  Enum*/
    public ?array $CodigoImpuestoAdicional = [];

    /**
     * Monto por línea de detalle.
     * @var float
     */
    public ?float $MontoItem;
    public function __construct(
        ?int $NroLinDet = null,
        ?array $CdgItem = null,
        ?IndicadorFacturacionExencion $IndExe = null,
        ?Retenedor $Retenedor = null,
        ?string $NmbItem = null,
        ?string $DscItem = null,
        ?float $QtyRef = null,
        ?string $UnmdRef = null,
        ?float $PrcRef = null,
        ?float $QtyItem = null,
        ?array $Subcantidad = null,
        ?string $FchElabor = null,
        ?string $FchVencim = null,
        ?string $UnmdItem = null,
        ?float $PrcItem = null,
        ?OtraMonedaDetalle $OtrMnda = null,
        ?float $DescuentoPct = null,
        ?int $DescuentoMonto = null,
        ?array $SubDscto = null,
        ?float $RecargoPct = null,
        ?int $RecargoMonto = null,
        ?array $SubRecargo = null,
        ?array $CodigoImpuestoAdicional = null,
        ?float $MontoItem = null
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
        $this->CodigoImpuestoAdicional = $CodigoImpuestoAdicional;
        $this->MontoItem = $MontoItem;
    }
}
