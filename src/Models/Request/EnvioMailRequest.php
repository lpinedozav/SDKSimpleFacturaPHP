<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Models\Facturacion\DteClass;
use SDKSimpleFactura\Models\Facturacion\MailClass;

class EnvioMailRequest
{
    /**
     * @var string
     */
    public ?string $rutEmpresa;

    /**
     * @var DteClass
     */
    public ?DteClass $dte;

    /**
     * @var MailClass
     */
    public ?MailClass $mail;

    /**
     * @var bool
     */
    public ?bool $xml;

    /**
     * @var bool
     */
    public ?bool $pdf;

    /**
     * @var string|null
     */
    public ?string $comments;

    /**
     * Constructor
     */
    public function __construct(
        ?string $rutEmpresa = null,
        ?DteClass $dte = null,
        ?MailClass $mail = null,
        ?bool $xml = null,
        ?bool $pdf = null,
        ?string $comments = null
        ){
            $this->rutEmpresa = $rutEmpresa;
            $this->dte = $dte;
            $this->mail = $mail;
            $this->xml = $xml;
            $this->pdf = $pdf;
            $this->comments = $comments;

        }
}
