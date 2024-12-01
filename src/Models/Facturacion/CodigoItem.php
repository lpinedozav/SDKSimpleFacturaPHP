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

    public function __construct(
        string $TpoCodigo,
        string $VlrCodigo
    ) {
        $this->TpoCodigo = $TpoCodigo;
        $this->VlrCodigo = $VlrCodigo;
    }
}
