<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\Ambiente;
use SDKSimpleFactura\Enum\DTEType;

class SolicitudFoliosRequest
{
    public ?string $rutEmpresa;
    public ?int $tipoDTE;
    public ?int $ambiente;

    public function __construct(
        ?string $rutEmpresa = null,
        ?int $tipoDTE = null,
        ?int $ambiente = null
    ) {
        $this->rutEmpresa = $rutEmpresa;
        $this->tipoDTE = $tipoDTE;
        $this->ambiente = $ambiente;
    }
}