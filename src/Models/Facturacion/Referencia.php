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
    public ?int $NroLinRef;

    /**
     * Tipo de documento siendo referenciado.
     * @var string
     */
    public ?string $TpoDocRef;

    /**
     * Indicador de referencia global.
     * @var int
     */
    public ?int $IndGlobal;

    /**
     * Identificación del documento siendo referenciado.
     * @var string
     */
    public ?string $FolioRef;

    /**
     * Sólo si el documento de referencia es de tipo tributario y fue emitido por otro contribuyente.
     * @var string
     */
    public ?string $RUTOtr;

    /**
     * Fecha del documento siendo referenciado.
     * @var DateTime
     */
    public ?DateTime $FchRef;

    /**
     * Código de referencia Enum.
     * @var TipoReferencia
     */
    public ?TipoReferencia $CodRef;

    /**
     * Razón de la referencia.
     * @var string
     */
    public ?string $RazonRef;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?int $NroLinRef = null,
        ?string $TpoDocRef = null,
        ?int $IndGlobal = null,
        ?string $FolioRef = null,
        ?string $RUTOtr = null,
        ?DateTime $FchRef = null,
        ?TipoReferencia $CodRef = null,
        ?string $RazonRef = null
    ) {
        $this->NroLinRef = $NroLinRef;
        $this->TpoDocRef = $TpoDocRef;
        $this->IndGlobal = $IndGlobal;
        $this->FolioRef = $FolioRef;
        $this->RUTOtr = $RUTOtr;
        $this->FchRef = $FchRef;
        $this->CodRef = $CodRef;
        $this->RazonRef = $RazonRef;
    }
}
