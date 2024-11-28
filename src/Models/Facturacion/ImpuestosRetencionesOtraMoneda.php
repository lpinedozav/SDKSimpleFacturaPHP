<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\TipoImpuesto;

class ImpuestosRetencionesOtraMoneda
{
    /**
     * Tipo de impuesto o retención adicional  Enum.
     * Código del impuesto o retención de acuerdo a la codificación detallada.
     * @var TipoImpuesto
     */
    public ?TipoImpuesto $TipoImpOtrMnda;

    /**
     * Tasa de impuesto o retención.
     * Según las tasas válidas al momento de la transacción.
     * @var float
     */
    public ?float $TasaImpOtrMnda;

    /**
     * Monto del impuesto o retención (en otra moneda).
     * Valor del impuesto o retención asociado al código indicado anteriormente.
     * @var float
     */
    public ?float $VlrImpOtrMnda;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?TipoImpuesto $TipoImpuesto = null,
        ?float $TasaImpOtrMnda = null,
        ?float $VlrImpOtrMnda = null
    ) {
        $this->TipoImpuesto = $TipoImpuesto;
        $this->TasaImpOtrMnda = $TasaImpOtrMnda;
        $this->VlrImpOtrMnda = $VlrImpOtrMnda;
    }


}
