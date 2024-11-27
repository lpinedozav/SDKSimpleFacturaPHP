<?php

namespace SDKSimpleFactura\Models\Facturacion;

class MontoPagoItem
{
    /**
     * Fecha de pago programado en formato AAAA-MM-DD.
     * @var string
     */
    public string $FchPago;

    /**
     * Monto de pago programado.
     * @var int
     */
    public int $MntPago;

    /**
     * Glosa adicional para calificar pago.
     * @var string
     */
    private string $GlosaPagos;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->FchPago = '';
        $this->MntPago = 0;
        $this->GlosaPagos = '';
    }

    /**
     * Getter para GlosaPagos.
     * @return string
     */
    public function getGlosaPagos(): string
    {
        return $this->GlosaPagos;
    }

    /**
     * Setter para GlosaPagos con truncamiento.
     * @param string $value
     * @return void
     */
    public function setGlosaPagos(string $value): void
    {
        $this->GlosaPagos = $this->truncate($value, 40);
    }

    /**
     * Trunca una cadena al tamaño máximo especificado.
     * @param string $string
     * @param int $maxLength
     * @return string
     */
    private function truncate(string $string, int $maxLength): string
    {
        return mb_substr($string, 0, $maxLength);
    }
}
