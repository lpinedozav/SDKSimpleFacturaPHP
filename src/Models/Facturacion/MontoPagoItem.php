<?php

namespace SDKSimpleFactura\Models\Facturacion;

class MontoPagoItem
{
    /**
     * Fecha de pago programado en formato AAAA-MM-DD.
     * @var string
     */
    public ?string $FchPago;

    /**
     * Monto de pago programado.
     * @var int
     */
    public ?int $MntPago;

    /**
     * Glosa adicional para calificar pago.
     * @var string
     */
    private ?string $GlosaPagos;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $FchPago = null,
        ?int $MntPago = null,
        ?int $GlosaPagos = null
    ) {
        $this->FchPago = $FchPago;
        $this->MntPago = $MntPago;
        $this->GlosaPagos = $GlosaPagos;
    }


}
