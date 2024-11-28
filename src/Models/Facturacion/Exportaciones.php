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
    public ?Encabezado $Encabezado;

    /**
     * Detalle de ítemes del DTE.
     * @var DetalleExportacion[]
     */
    public ?array $Detalle;

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
    public function __construct(
        ?string $Id = null,
        ?Encabezado $Encabezado = null,
        ?array $Detalle = null,
        ?array $SubTotInfo = null,
        ?array $DscRcgGlobal = null,
        ?array $Referencia = null,
        ?array $Comisiones = null
    ) {
        $this->Id = $Id;
        $this->Encabezado = $Encabezado;
        $this->Detalle = $Detalle;
        $this->SubTotInfo = $SubTotInfo;
        $this->DscRcgGlobal = $DscRcgGlobal;
        $this->Referencia = $Referencia;
        $this->Comisiones = $Comisiones;
    }
}
