<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;
use SDKSimpleFactura\Enum\CodigoTraslado;

class GuiaExportacion
{
    /**
     * Código de traslado Enum.
     * @var string
     */
    public CodigoTraslado $CdgTraslado;

    /**
     * Folio de autorización del SII.
     * @var int
     */
    public int $FolioAut;

    /**
     * Fecha de autorización en formato (AAAA-MM-DD).
     * @var DateTime
     */
    private DateTime $FchAut;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->CdgTraslado = 'NotSet'; // Valor predeterminado
        $this->FolioAut = 0;
        $this->FchAut = '';
    }

    /**
     * Getter para la fecha de autorización.
     * @return string
     */
    public function getFechaAutorizacion(): DateTime
    {
        return $this->FchAut;
    }

    /**
     * Setter para la fecha de autorización.
     * @param string $value Fecha en formato 'YYYY-MM-DD'.
     * @return void
     */
    public function setFechaAutorizacion(string $value): void
    {
        $this->FchAut = $this->validateDateFormat($value) ? $value : '';
    }

    /**
     * Valida si una fecha tiene el formato correcto (YYYY-MM-DD).
     * @param string $date
     * @return bool
     */
    private function validateDateFormat(string $date): bool
    {
        $format = 'Y-m-d';
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}
