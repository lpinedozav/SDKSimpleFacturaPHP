<?php

namespace SDKSimpleFactura\Models\Request;

use SDKSimpleFactura\Enum\SyncType;

/**
 * Request para consultar la última sincronización con el SII
 * (/sii/lastsync/{mes}/{anio}).
 */
class UltimaSyncRequest
{
    public ?Credenciales $Credenciales;
    public ?SyncType $Tipo;

    public function __construct(
        ?Credenciales $Credenciales = null,
        ?SyncType $Tipo = null
    ) {
        $this->Credenciales = $Credenciales;
        $this->Tipo = $Tipo;
    }
}
