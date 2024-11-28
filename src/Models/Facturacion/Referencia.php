<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;
use SDKSimpleFactura\Enum\TipoReferencia;

class Referencia
{
    /**
     * Número secuencial de la referencia.
     * De 1 a 40.
     * @var int
     */
    public int $NroLinRef;

    /**
     * Tipo de documento siendo referenciado.
     * @var string
     */
    public string $TpoDocRef;

    /**
     * Indicador de referencia global.
     * @var int
     */
    public int $IndGlobal;

    /**
     * Identificación del documento siendo referenciado.
     * @var string
     */
    public string $FolioRef;

    /**
     * Sólo si el documento de referencia es de tipo tributario y fue emitido por otro contribuyente.
     * @var string
     */
    public string $RUTOtr;

    /**
     * Fecha del documento siendo referenciado.
     * @var DateTime
     */
    public DateTime $FchRef;

    /**
     * Código de referencia Enum.
     * @var TipoReferencia
     */
    public TipoReferencia $CodRef;

    /**
     * Razón de la referencia.
     * @var string
     */
    public string $RazonRef;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->NroLinRef = 0;
        $this->TpoDocRef = '';
        $this->IndGlobal = 0;
        $this->FolioRef = '';
        $this->RUTOtr = '';
        $this->FchRef = '';
        $this->CodRef = TipoReferencia::NotSet;
        $this->RazonRef = '';
    }
}
