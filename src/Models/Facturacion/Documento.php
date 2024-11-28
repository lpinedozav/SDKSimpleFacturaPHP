<?php
namespace SDKSimpleFactura\Models\Facturacion;


class Documento
{
    public ?string $Id = null;

    /**
     * Identificación y totales del documento.
     * @var Encabezado
     */
    public ?Encabezado $Encabezado;

    /**
     * Detalle de ítems del DTE.
     * Corresponde a la información de un ítem. Debe ir al menos una línea de detalle.
     * @var Detalle[]
     */
    public array $Detalle = [];

    /**
     * Subtotales informativos.
     * Estos subtotales no aumentan o disminuyen la base del impuesto.
     * @var SubTotal[]
     */
    public array $SubTotInfo = [];

    /**
     * Descuentos y/o recargos que afectan al total del documento.
     * @var DescuentosRecargos[]
     */
    public ?array $DscRcgGlobal = [];

    /**
     * Identificación de otros documentos referenciados por este documento.
     * @var Referencia[]
     */
    public ?array $Referencia = [];

    /**
     * Comisiones y otros cargos.
     * Es obligatoria para liquidaciones de factura.
     * @var ComisionRecargo[]
     */
    public ?array $Comisiones = [];

    /**
     * Constructor para inicializar las propiedades con valores predeterminados.
     */
    public function __construct()
    {
        $this->Encabezado = new Encabezado();
        $this->Detalle = [];
        $this->SubTotInfo = [];
        $this->DscRcgGlobal = [];
        $this->Referencia = [];
        $this->Comisiones = [];
    }
}