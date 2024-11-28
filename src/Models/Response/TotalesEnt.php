<?php

namespace SDKSimpleFactura\Models\Response;

class TotalesEnt
{
    /**
     * Total de honorarios.
     * @var float|null
     */
    public ?float $TotalHonorarios = null;

    /**
     * Total bruto.
     * @var float|null
     */
    public ?float $Bruto = null;

    /**
     * Total líquido.
     * @var float|null
     */
    public ?float $Liquido = null;

    /**
     * Total pagado.
     * @var float|null
     */
    public ?float $Pagado = null;

    /**
     * Total retenido.
     * @var float|null
     */
    public ?float $Retenido = null;
}
