<?php

namespace SDKSimpleFactura\Services;

use GuzzleHttp\Promise\PromiseInterface;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Interfaces\IConfiguracionService;
use SDKSimpleFactura\Models\Request\Credenciales;
use SDKSimpleFactura\Models\Request\CertificadoUploadRequest;
use SDKSimpleFactura\Models\Request\UltimaSyncRequest;
use SDKSimpleFactura\Models\Response\EmisorApiEnt;
use SDKSimpleFactura\Models\Response\ActividadeconomicaApiEnt;
use SDKSimpleFactura\Models\Response\LastSyncResponse;
use SDKSimpleFactura\Models\Response\TokenExpireEnt;

class ConfiguracionService implements IConfiguracionService
{
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function DatosEmpresaAsync(Credenciales $credenciales): PromiseInterface
    {
        $url = '/datosEmpresa';
        return $this->apiService->PostAsync($url, $credenciales, EmisorApiEnt::class);
    }
    public function ObtenerActividadesEconomicasAsync(): PromiseInterface
    {
        $url = '/actividades-economicas';
        return $this->apiService->GetAsync($url, ActividadeconomicaApiEnt::class);
    }
    public function ObtenerUltimaSincronizacionSiiAsync(UltimaSyncRequest $request, int $mes, int $anio): PromiseInterface
    {
        $url = "/sii/lastsync/{$mes}/{$anio}";
        return $this->apiService->PostAsync($url, $request, LastSyncResponse::class);
    }
    public function TiempoExpiracionTokenAsync(): PromiseInterface
    {
        $url = '/token/expire';
        return $this->apiService->GetAsync($url, TokenExpireEnt::class);
    }
    public function SubirCertificadoAsync(CertificadoUploadRequest $certificadoData, string $pathCertificado): PromiseInterface
    {
        $url = '/certificado/subir';
        $multipart = [
            [
                'name' => 'certificadoData',
                'contents' => json_encode($certificadoData)
            ],
            [
                'name' => 'certificado',
                'contents' => fopen($pathCertificado, 'r'),
                'filename' => basename($pathCertificado)
            ]
        ];
        return $this->apiService->PostAsyncMultipart($url, $multipart);
    }
    public function SubirLogoAsync(Credenciales $credenciales, string $pathLogo): PromiseInterface
    {
        $url = '/upload-logo';
        $multipart = [
            [
                'name' => 'CredencialesJson',
                'contents' => json_encode($credenciales)
            ],
            [
                'name' => 'Logo',
                'contents' => fopen($pathLogo, 'r'),
                'filename' => basename($pathLogo)
            ]
        ];
        return $this->apiService->PostAsyncMultipart($url, $multipart);
    }
}
