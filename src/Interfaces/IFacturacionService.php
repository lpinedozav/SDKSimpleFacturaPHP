<?php
// src/Interfaces/IFacturacionService.php
namespace SDKSimpleFactura\Interfaces;

interface IFacturacionService
{
    public function ObtenerPdfDteAsync($solicitud);
}
