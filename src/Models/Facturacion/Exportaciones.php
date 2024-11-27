<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Exportaciones
{
    /**
     * Identificador único.
     * @var string|null
     */
    public ?string $Id;

    /**
     * Identificación y totales del documento.
     * @var Encabezado
     */
    public Encabezado $Encabezado;

    /**
     * Detalle de ítemes del DTE.
     * @var DetalleExportacion[]
     */
    public array $Detalle;

    /**
     * Subtotales informativos.
     * @var SubTotal[]|null
     */
    public ?array $SubTotInfo;

    /**
     * Descuentos y/o recargos que afecta al total del documento.
     * @var DescuentosRecargos[]|null
     */
    public ?array $DscRcgGlobal;

    /**
     * Identificación de otros documentos referenciados por este documento.
     * @var Referencia[]|null
     */
    public ?array $Referencia;

    /**
     * Comisiones y otros cargos.
     * @var ComisionRecargo[]|null
     */
    public ?array $Comisiones;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->Id = null;
        $this->Encabezado = new Encabezado();
        $this->Detalle = [];
        $this->SubTotInfo = null;
        $this->DscRcgGlobal = null;
        $this->Referencia = null;
        $this->Comisiones = null;
    }
}
