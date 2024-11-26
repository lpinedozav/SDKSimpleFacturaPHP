<?php

namespace SdkSimpleFactura\Models\Request;

class Credenciales {
    public string $emailUsuario;
    public string $rutEmisor;
    public string $rutContribuyente;
    public string $nombreSucursal;

    public function __construct(string $emailUsuario, string $rutEmisor, string $rutContribuyente, string $nombreSucursal) {
        $this->emailUsuario = $emailUsuario;
        $this->rutEmisor = $rutEmisor;
        $this->rutContribuyente = $rutContribuyente;
        $this->nombreSucursal = $nombreSucursal;
    }
}
