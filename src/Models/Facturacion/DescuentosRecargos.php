<?php

namespace SDKSimpleFactura\Models\Facturacion;

class DescuentosRecargos
{
    /**
     * Número secuencial de línea.
     * La obligatoriedad se refiere a que si se incluye esta zona debe haber al menos una línea y este caso debe ir el dato de número de línea.
     * @var int
     */
    public int $NroLinDR;

    /**
     * Tipo de movimiento Enum.
     * @var string
     */
    public string $TpoMov;

    /**
     * Descripción del descuento o recargo.
     * @var string
     */
    public string $GlosaDR;

    /**
     * Unidad en que se expresa el valor Enum.
     * @var string
     */
    public string $TpoValor;

    /**
     * Valor del descuento o recargo.
     * @var float
     */
    public float $ValorDR;

    /**
     * Valor en otra moneda.
     * @var float
     */
    public float $ValorDROtrMnda;

    /**
     * Indica si el descuento o recargo es No afecto o no facturable  Enum.
     * @var string
     */
    public string $IndExeDR;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->NroLinDR = 0;
        $this->TpoMov = 'NotSet';
        $this->GlosaDR = '';
        $this->TpoValor = 'NotSet';
        $this->ValorDR = 0.0;
        $this->ValorDROtrMnda = 0.0;
        $this->IndExeDR = 'NotSet';
    }

    private function truncate(string $value, int $length): string
    {
        return mb_substr($value, 0, $length);
    }

    /**
     * Asignar un valor truncado a TpoCodigo.
     * @param string $value
     */
    public function setGlosaDR(string $value): void
    {
        $this->GlosaDR = $this->truncate($value, length: 45);
    }
    
    public function getValorDR(): float
    {
        return round($this->ValorDR, 2);
    }

    public function setValorDR(float $value): void
    {
        $this->ValorDR = $value;
    }
    public function getValorDROtrMnda(): float
    {
        return round($this->ValorDROtrMnda, 4);
    }

    public function setValorDROtrMnda(float $value): void
    {
        $this->ValorDROtrMnda = $value;
    }


}
