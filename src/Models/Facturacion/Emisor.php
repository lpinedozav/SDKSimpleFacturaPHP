<?php
namespace SDKSimpleFactura\Models\Facturacion;

class Emisor
{
    /**
     * Rut del emisor del DTE.
     * @var string
     */
    public string $RUTEmisor;

    /**
     * Nombre o razón social del Emisor.
     * @var string|null
     */
    public ?string $RznSoc = null;

    /**
     * Razón social para boletas.
     * @var string|null
     */
    public ?string $RznSocEmisor = null;

    /**
     * Giro del emisor.
     * @var string|null
     */
    public ?string $GiroEmis = null;

    /**
     * Giro del emisor.
     * @var string|null
     */
    public ?string $GiroEmisor = null;

    /**
     * Teléfonos del emisor.
     * @var array
     */
    public array $Telefono = [];

    /**
     * Correo electrónico de contacto del emisor.
     * @var string|null
     */
    public ?string $CorreoEmisor = null;

    /**
     * Códigos de actividad económica.
     * @var array
     */
    public array $Acteco = [];

    /**
     * Emisor de una Guía de despacho para exportación.
     * @var GuiaExportacion|null
     */
    public ?GuiaExportacion $GuiaExport = null;

    /**
     * Sucursal que emite el DTE.
     * @var string
     */
    public string $Sucursal;

    /**
     * Código SII de la sucursal.
     * @var int
     */
    public int $CdgSIISucur;

    /**
     * Dirección de origen.
     * @var string
     */
    public string $DirOrigen;

    /**
     * Comuna de origen.
     * @var string
     */
    public string $CmnaOrigen;

    /**
     * Ciudad de origen.
     * @var string
     */
    public string $CiudadOrigen;

    /**
     * Código del vendedor.
     * @var string
     */
    public string $CdgVendedor;

    /**
     * Identificador adicional del emisor.
     * @var string
     */
    public string $IdAdicEmisor;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->RUTEmisor = '';
        $this->RznSoc = '';
        $this->RznSocEmisor = '';
        $this->GiroEmis = '';
        $this->GiroEmisor = '';
        $this->Telefono = [];
        $this->CorreoEmisor = '';
        $this->Acteco = [];
        $this->GuiaExport = null;
        $this->Sucursal = '';
        $this->CdgSIISucur = 0;
        $this->DirOrigen = '';
        $this->CmnaOrigen = '';
        $this->CiudadOrigen = '';
        $this->CdgVendedor = '';
        $this->IdAdicEmisor = '';
    }

    /**
     * Trunca una cadena al tamaño máximo especificado.
     * @param string|null $string
     * @param int $maxLength
     * @return string|null
     */
    private function truncate(?string $string, int $maxLength): ?string
    {
        return $string ? mb_substr($string, 0, $maxLength) : null;
    }

    // Métodos "getters" y "setters" con truncamiento para propiedades que necesitan recortar texto.

    public function setRznSoc(?string $value): void
    {
        $this->RznSoc = $this->truncate($value, 70);
    }

    public function setRznSocEmisor(?string $value): void
    {
        $this->RznSocEmisor = $this->truncate($value, 100);
    }

    public function setGiroEmis(?string $value): void
    {
        $this->GiroEmis = $this->truncate($value, 80);
    }

    public function setGiroEmisor(?string $value): void
    {
        $this->GiroEmisor = $this->truncate($value, 80);
    }

    public function setTelefono(array $value): void
    {
        $this->Telefono = array_map(fn($tel) => $this->truncate($tel, 20), $value);
    }

    public function setSucursal(string $value): void
    {
        $this->Sucursal = $this->truncate($value, 20);
    }

    public function setDirOrigen(string $value): void
    {
        $this->DirOrigen = $this->truncate($value, 70);
    }

    public function setCdgVendedor(string $value): void
    {
        $this->CdgVendedor = $this->truncate($value, 60);
    }

    public function setIdAdicEmisor(string $value): void
    {
        $this->IdAdicEmisor = $this->truncate($value, 20);
    }
}
