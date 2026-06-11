<?php

namespace SDKSimpleFactura\Interfaces;

use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\CertificadoUploadRequest;
use SDKSimpleFactura\Models\Request\UltimaSyncRequest;
use GuzzleHttp\Promise\PromiseInterface;

interface IConfiguracionService
{
    public function DatosEmpresaAsync(Credenciales $credenciales): PromiseInterface;
    public function ObtenerActividadesEconomicasAsync(): PromiseInterface;
    public function ObtenerUltimaSincronizacionSiiAsync(UltimaSyncRequest $request, int $mes, int $anio): PromiseInterface;
    public function TiempoExpiracionTokenAsync(): PromiseInterface;
    public function SubirCertificadoAsync(CertificadoUploadRequest $certificadoData, string $pathCertificado): PromiseInterface;
    public function SubirLogoAsync(Credenciales $credenciales, string $pathLogo): PromiseInterface;
}
