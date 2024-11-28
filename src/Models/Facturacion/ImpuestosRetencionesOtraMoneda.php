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
    public TipoImpuesto $TipoImpOtrMnda;

    /**
     * Tasa de impuesto o retención.
     * Según las tasas válidas al momento de la transacción.
     * @var float
     */
    public float $TasaImpOtrMnda;

    /**
     * Monto del impuesto o retención (en otra moneda).
     * Valor del impuesto o retención asociado al código indicado anteriormente.
     * @var float
     */
    public float $VlrImpOtrMnda;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TipoImpOtrMnda = TipoImpuesto::NotSet; // Asignar un valor predeterminado como 'NotSet' si es necesario
        $this->TasaImpOtrMnda = 0.0;
        $this->VlrImpOtrMnda = 0.0;
    }

    /**
     * Establece la tasa de impuesto o retención, redondeándola a dos decimales.
     * @param float $value
     */
    public function setTasaImpOtrMnda(float $value): void
    {
        $this->TasaImpOtrMnda = round($value, 2);
    }

    /**
     * Establece el valor del impuesto o retención en otra moneda, redondeándolo a cuatro decimales.
     * @param float $value
     */
    public function setVlrImpOtrMnda(float $value): void
    {
        $this->VlrImpOtrMnda = round($value, 4);
    }
}
