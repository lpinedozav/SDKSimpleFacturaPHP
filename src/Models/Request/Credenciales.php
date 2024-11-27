<?php
/*bdsidns*/

namespace SDKSimpleFactura\Models\Request;

class Credenciales
{
    public ?string $emailUsuario;
    public ?string $rutEmisor;
    public ?string $rutContribuyente;
    public ?string $nombreSucursal;
    public function __construct(
        ?string $emailUsuario = null,
        ?string $rutEmisor = null,
        ?string $rutContribuyente = null,
        ?string $nombreSucursal = null
    ) {
        $this->emailUsuario = $emailUsuario;
        $this->rutEmisor = $rutEmisor;
        $this->rutContribuyente = $rutContribuyente;
        $this->nombreSucursal = $nombreSucursal;
    }
}
