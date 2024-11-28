<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\TipoImpuesto;

class ImpuestosRetenciones
{
    /**
     * Tipo de impuesto o retención adicional  Enum.
     * Código del impuesto o retención de acuerdo a la codificación detallada en la tabla de códigos.
     * @var TipoImpuesto
     */
    public ?TipoImpuesto $TipoImp;

    /**
     * Tasa de impuesto o retención.
     * Se debe indicar la tasa de Impuesto adicional o retención.
     * En el caso de impuesto específicos se puede omitir.
     * Según las tasas válidas al momento de la transacción.
     * @var float
     */
    public ?float $TasaImp;

    /**
     * Monto del impuesto o retención.
     * Valor del impuesto o retención asociado al código indicado anteriormente.
     * @var int
     */
    public ?int $MontoImp;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?TipoImpuesto $TipoImpuesto = null,
        ?float $TasaImp = null,
        ?int $MontoImp = null
    ) {
        $this->TipoImpuesto = $TipoImpuesto;
        $this->TasaImp = $TasaImp;
        $this->MontoImp = $MontoImp;
    }

}
