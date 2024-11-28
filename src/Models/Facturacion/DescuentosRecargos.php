<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\ExpresionDinero;
use SDKSimpleFactura\Enum\TipoMovimiento;
use SDKSimpleFactura\Enum\;

class DescuentosRecargos
{
    /**
     * Número secuencial de línea.
     * La obligatoriedad se refiere a que si se incluye esta zona debe haber al menos una línea y este caso debe ir el dato de número de línea.
     * @var int
     */
    public ?int $NroLinDR;

    /**
     * Tipo de movimiento Enum.
     * @var TipoMovimiento
     */
    public ?TipoMovimiento $TpoMov;

    /**
     * Descripción del descuento o recargo.
     * @var string
     */
    public ?string $GlosaDR;

    /**
     * Unidad en que se expresa el valor Enum.
     * @var ExpresionDinero
     */
    public ?ExpresionDinero $TpoValor;

    /**
     * Valor del descuento o recargo.
     * @var float
     */
    public ?float $ValorDR;

    /**
     * Valor en otra moneda.
     * @var float
     */
    public ?float $ValorDROtrMnda;

    /**
     * Indica si el descuento o recargo es No afecto o no facturable  Enum.
     * @var string
     */
    public ?string $IndExeDR;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?int $NroLinDR = null,
        ?int $TpoMov = null,
        ?string $GlosaDR = null,
        ?ExpresionDinero $TpoValor = null,
        ?float $ValorDR = null,
        ?float $valorDROtrMnda = null,
        )
    
}
