<?php

namespace SDKSimpleFactura\Models\Facturacion;

class ImpuestosRetenciones
{
    /**
     * Tipo de impuesto o retención adicional  Enum.
     * Código del impuesto o retención de acuerdo a la codificación detallada en la tabla de códigos.
     * @var string
     */
    public string $TipoImp;

    /**
     * Tasa de impuesto o retención.
     * Se debe indicar la tasa de Impuesto adicional o retención.
     * En el caso de impuesto específicos se puede omitir.
     * Según las tasas válidas al momento de la transacción.
     * @var float
     */
    public float $TasaImp;

    /**
     * Monto del impuesto o retención.
     * Valor del impuesto o retención asociado al código indicado anteriormente.
     * @var int
     */
    public int $MontoImp;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TipoImp = ''; // Puedes usar 'NotSet' como en C# si defines una constante.
        $this->TasaImp = 0.0;
        $this->MontoImp = 0;
    }

    /**
     * Redondea la tasa de impuesto a dos decimales.
     * @param float $value
     */
    public function setTasaImp(float $value): void
    {
        $this->TasaImp = round($value, 2);
    }
}
