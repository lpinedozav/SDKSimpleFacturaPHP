<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Retenedor
{
    /**
     * Indicador agente retenedor.
     * Obligatorio para agentes retenedores, indica para cada transacción si es agente retenedor del producto que está vendiendo.
     * @var string
     */
    public ?string $IndAgente;

    /**
     * Monto base faenamiento.
     * Sólo para transacciones realizadas por Agentes Retenedores, según códigos de retención 17.
     * @var int
     */
    public ?int $MntBaseFaena;

    /**
     * Márgenes de comercialización.
     * Sólo para transacciones realizadas por Agentes Retenedores, según códigos de retención 14 y 50.
     * @var int
     */
    public ?int $MntMargComer;

    /**
     * Precio unitario neto consumidor final.
     * Sólo para transacciones realizadas por Agentes Retenedores, según códigos de retención 14, 17 y 50.
     * @var int
     */
    public ?int $PrcConsFinal;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $IndAgente = null,
        ?int $MntBaseFaena = null,
        ?int $MntMargComer = null,
        ?int $PrcConsFinal = null
    ) {
        $this->IndAgente = $IndAgente;
        $this->MntBaseFaena = $MntBaseFaena;
        $this->MntMargComer = $MntMargComer;
        $this->PrcConsFinal = $PrcConsFinal;
    }
}
