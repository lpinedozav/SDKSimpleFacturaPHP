<?php

namespace SDKSimpleFactura\Models\Request;

/**
 * Datos del certificado digital enviados junto al archivo .pfx/.p12 (/certificado/subir).
 */
class CertificadoUploadRequest
{
    public ?Credenciales $Credenciales;
    public ?string $RutCertificado;
    public ?string $Password;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?string $RutCertificado = null,
        ?string $Password = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->RutCertificado = $RutCertificado;
        $this->Password = $Password;
    }
}
