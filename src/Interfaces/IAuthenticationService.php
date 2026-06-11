<?php
// src/Interfaces/IAuthenticationService.php
namespace SDKSimpleFactura\Interfaces;

interface IAuthenticationService
{
    /**
     * Devuelve un token JWT válido (lo solicita o renueva si expiró).
     */
    public function getToken(): string;
}
