<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Receptor
{
    /**
     * Rut del receptor del DTE.
     * @var string
     */
    public ?string $RUTRecep;

    /**
     * Código interno del receptor.
     * @var string
     */
    public ?string $CdgIntRecep;

    /**
     * Nombre o razón social del receptor.
     * @var string
     */
    public ?string $RznSocRecep;

    /**
     * Receptor extranjero.
     * @var Extranjero|null
     */
    public ?Extranjero $Extranjero = null;

    /**
     * Giro comercial del receptor.
     * @var string
     */
    public ?string $GiroRecep;

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
    public ?string $CmnaRecep;

    /**
     * Ciudad de recepción.
     * @var string
     */
    public ?string $CiudadRecep;

    /**
     * Dirección postal.
     * @var string
     */
    public ?string $DirPostal;

    /**
     * Comuna postal.
     * @var string
     */
    public ?string $CmnaPostal;

    /**
     * Ciudad postal.
     * @var string
     */
    public ?string $CiudadPostal;
    public function __construct(
        ?string $RUTRecep = null,
        ?string $CdgIntRecep = null,
        ?string $RznSocRecep = null,
        ?Extranjero $Extranjero = null,
        ?string $GiroRecep = null,
        ?string $Contacto = null,
        ?string $CorreoRecep = null,
        ?string $DirRecep = null,
        ?string $CmnaRecep = null,
        ?string $CiudadRecep = null,
        ?string $DirPostal = null,
        ?string $CmnaPostal = null,
        ?string $CiudadPostal = null
    ) {
        $this->RUTRecep = $RUTRecep;
        $this->CdgIntRecep = $CdgIntRecep;
        $this->RznSocRecep = $RznSocRecep;
        $this->Extranjero = $Extranjero;
        $this->GiroRecep = $GiroRecep;
        $this->Contacto = $Contacto;
        $this->CorreoRecep = $CorreoRecep;
        $this->DirRecep = $DirRecep;
        $this->CmnaRecep = $CmnaRecep;
        $this->CiudadRecep = $CiudadRecep;
        $this->DirPostal = $DirPostal;
        $this->CmnaPostal = $CmnaPostal;
        $this->CiudadPostal = $CiudadPostal;
    }
}
