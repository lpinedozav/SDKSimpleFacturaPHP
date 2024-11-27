<?php
// src/Services/FacturacionService.php
namespace SDKSimpleFactura\Services;

use SDKSimpleFactura\Interfaces\IFacturacionService;
use SDKSimpleFactura\Interfaces\IApiService;
use SDKSimpleFactura\Models\Response\Response;

class FacturacionService implements IFacturacionService
{
    private $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function ObtenerPdfDteAsync($solicitud)
    {
        $url = '/dte/pdf';
        $result = $this->apiService->postForByteArrayAsync($url, $solicitud);

        if ($result->IsSuccess) {
            return new Response(200, $result->Data);
        } else {
            return new Response($result->StatusCode, null, $result->Errores);
        }
    }
}
