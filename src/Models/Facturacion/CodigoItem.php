<?php

namespace SDKSimpleFactura\Models\Facturacion;

class CodigoItem
{
    /**
     * Tipo de codificación utilizada para el item.
     * Standart: EAN, PLU, DUN14, INT1, INT2, EAN128, Interna, etc.
     * @var string
     */
    public string $TpoCodigo;

    /**
     * Valor del código para TipoCodigo.
     * @var string
     */
    public string $VlrCodigo;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->TpoCodigo = '';
        $this->VlrCodigo = '';
    }

    /**
     * Trunca una cadena a la longitud máxima especificada.
     * @param string $value
     * @param int $length
     * @return string
     */
    private function truncate(string $value, int $length): string
    {
        return mb_substr($value, 0, $length);
    }

    /**
     * Asignar un valor truncado a TpoCodigo.
     * @param string $value
     */
    public function setTpoCodigo(string $value): void
    {
        $this->TpoCodigo = $this->truncate($value, 10);
    }

    /**
     * Asignar un valor truncado a VlrCodigo.
     * @param string $value
     */
    public function setVlrCodigo(string $value): void
    {
        $this->VlrCodigo = $this->truncate($value, 35);
    }
}
