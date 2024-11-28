<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Models\Facturacion\DteClass;
use SDKSimpleFactura\Models\Facturacion\MailClass;

class EnvioMailRequest
{
    /**
     * @var string
     */
    public string $rutEmpresa;

    /**
     * @var DteClass
     */
    public DteClass $dte;

    /**
     * @var MailClass
     */
    public MailClass $mail;

    /**
     * @var bool
     */
    public bool $xml;

    /**
     * @var bool
     */
    public bool $pdf;

    /**
     * @var string|null
     */
    public ?string $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dte = new DteClass();
        $this->mail = new MailClass();
        $this->rutEmpresa = '';
        $this->xml = false;
        $this->pdf = false;
        $this->comments = null;
    }
}
