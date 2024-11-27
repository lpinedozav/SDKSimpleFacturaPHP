<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Receptor
{
    /**
     * Rut del receptor del DTE.
     * @var string
     */
    public string $RUTRecep;

    /**
     * Código interno del receptor.
     * @var string
     */
    public string $CdgIntRecep;

    /**
     * Nombre o razón social del receptor.
     * @var string
     */
    public string $RznSocRecep;

    /**
     * Receptor extranjero.
     * @var Extranjero|null
     */
    public ?Extranjero $Extranjero = null;

    /**
     * Giro comercial del receptor.
     * @var string
     */
    public string $GiroRecep;

    /**
     * Teléfono e Email del contacto del receptor.
     * @var string|null
     */
    public ?string $Contacto;

    /**
     * Correo electrónico de contacto en la empresa del receptor.
     * @var string|null
     */
    public ?string $CorreoRecep;

    /**
     * Dirección en la cual se envían los productos o se prestan los servicios.
     * @var string|null
     */
    public ?string $DirRecep;

    /**
     * Comuna de recepción.
     * @var string
     */
    public string $CmnaRecep;

    /**
     * Ciudad de recepción.
     * @var string
     */
    public string $CiudadRecep;

    /**
     * Dirección postal.
     * @var string
     */
    public string $DirPostal;

    /**
     * Comuna postal.
     * @var string
     */
    public string $CmnaPostal;

    /**
     * Ciudad postal.
     * @var string
     */
    public string $CiudadPostal;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->RUTRecep = '';
        $this->CdgIntRecep = '';
        $this->RznSocRecep = '';
        $this->Extranjero = null;
        $this->GiroRecep = '';
        $this->Contacto = '';
        $this->CorreoRecep = '';
        $this->DirRecep = '';
        $this->CmnaRecep = '';
        $this->CiudadRecep = '';
        $this->DirPostal = '';
        $this->CmnaPostal = '';
        $this->CiudadPostal = '';
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

    // Métodos "getters" y "setters" con truncamiento para las propiedades correspondientes.

    public function setCdgIntRecep(string $value): void
    {
        $this->CdgIntRecep = $this->truncate($value, 20);
    }

    public function setGiroRecep(string $value): void
    {
        $this->GiroRecep = $this->truncate($value, 40);
    }

    public function setContacto(?string $value): void
    {
        $this->Contacto = $this->truncate($value, 80);
    }

    public function setDirRecep(?string $value): void
    {
        $this->DirRecep = $this->truncate($value, 70);
    }

    public function setCmnaRecep(string $value): void
    {
        $this->CmnaRecep = $this->truncate($value, 20);
    }

    public function setDirPostal(string $value): void
    {
        $this->DirPostal = $this->truncate($value, 70);
    }
}


