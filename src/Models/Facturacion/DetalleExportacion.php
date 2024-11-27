<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;

class DetalleExportacion
{
    /**
     * Número secuencial de línea.
     * De 1 a 60.
     * @var int
     */
    public int $NroLinDet;

    /** @var CodigoItem[] */
    public ?array $CdgItem = [];

    /**
     * Indicador de exención/facturación Enum.
     * @var int
     */
    public int $IndExe;

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
    public float $QtyRef;

    /**
     * Unidad de medida de referencia.
     * @var string
     */
    public string $UnmdRef;

    /**
     * Precio unitario de referencia.
     * @var float
     */
    public float $PrcRef;

    /**
     * Cantidad del ítem.
     * @var float
     */
    public float $QtyItem;

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
    public string $UnmdItem;

    /**
     * Precio unitario del ítem en pesos.
     * @var float
     */
    public float $PrcItem;

    /**
     * Precio del ítem en otra moneda.
     * @var OtraMonedaDetalle|null
     */
    public ?OtraMonedaDetalle $OtrMnda;

    /**
     * Porcentaje de descuento.
     * @var float
     */
    public float $DescuentoPct;

    /**
     * Monto del descuento.
     * @var int
     */
    public int $DescuentoMonto;

    /** @var SubDescuento[] */
   public ?array $SubDscto = [];

    /**
     * Porcentaje de recargo.
     * @var float
     */
    public float $RecargoPct;

    /**
     * Monto de recargo.
     * @var int
     */
    public int $RecargoMonto;

   
    /** @var SubRecargo[] */
    public ?array $SubRecargo = [];

     /** @var TipoImpuesto[]  Enum*/
     public ?array $CodigoImpuestoAdicional = [];

    /**
     * Monto por línea de detalle.
     * @var float
     */
    public float $MontoItem;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->NroLinDet = 0;
        $this->NmbItem = '';
        $this->MontoItem = 0.0;
        $this->CdgItem = null;
        $this->IndExe = 0; // Enum default
        $this->Retenedor = null;
        $this->DscItem = '';
        $this->QtyRef = 0.0;
        $this->UnmdRef = '';
        $this->PrcRef = 0.0;
        $this->QtyItem = 0.0;
        $this->Subcantidad = null;
        $this->FchElabor = null;
        $this->FchVencim = null;
        $this->UnmdItem = '';
        $this->PrcItem = 0.0;
        $this->OtrMnda = null;
        $this->DescuentoPct = 0.0;
        $this->DescuentoMonto = 0;
        $this->SubDscto = null;
        $this->RecargoPct = 0.0;
        $this->RecargoMonto = 0;
        $this->SubRecargo = null;
        $this->CodigoImpuestoAdicional = null;
    }
}
