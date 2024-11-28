<?php

namespace SDKSimpleFactura\Models\Facturacion;

class MailClass
{
    /**
     * @var array
     */
    public ?array $to;

    /**
     * @var array
     */
    public ?array $ccos;

    /**
     * @var array
     */
    public ?array $ccs;

    /**
     * Constructor
     */
    public function __construct(
        ?array $to = [],
        ?array $ccos = [],
        ?array $ccs = []
    ) {
        $this->to = $to;
        $this->ccos = $ccos;
        $this->ccs = $ccs;
    }
}
