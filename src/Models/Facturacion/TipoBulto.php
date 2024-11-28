<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\TipoBulto as TipoBultoEnum;

class TipoBulto
{
    /**
     * Código según tabla "Tipos de bultos" de Aduana Enum.
     * @var TipoBultoEnum
     */
    public TipoBultoEnum $CodTpoBultos;

    /**
     * Cantidad de Bultos.
     * @var int
     */
    public int $CantBultos;

    /**
     * Identificación de marcas, cuando es distinto de contenedor.
     * @var string
     */
    public string $Marcas;

    /**
     * Se utiliza cuando el tipo de bulto es contenedor.
     * @var string
     */
    public string $IdContainer;

    /**
     * Sello contenedor, con dígito verificador.
     * @var string
     */
    public string $Sello;

    /**
     * Nombre emisor sello.
     * @var string
     */
    public string $EmisorSello;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->CodTpoBultos = TipoBultoEnum::NotSet;
        $this->CantBultos = 0;
        $this->Marcas = '';
        $this->IdContainer = '';
        $this->Sello = '';
        $this->EmisorSello = '';
    }

    /**
     * Establece y trunca las marcas a un máximo de 255 caracteres.
     * @param string $value
     */
    public function setMarcas(string $value): void
    {
        $this->Marcas = mb_substr($value, 0, 255);
    }

    /**
     * Establece y trunca el ID del contenedor a un máximo de 25 caracteres.
     * @param string $value
     */
    public function setIdContainer(string $value): void
    {
        $this->IdContainer = mb_substr($value, 0, 25);
    }

    /**
     * Establece y trunca el sello a un máximo de 20 caracteres.
     * @param string $value
     */
    public function setSello(string $value): void
    {
        $this->Sello = mb_substr($value, 0, 20);
    }

    /**
     * Establece y trunca el emisor del sello a un máximo de 70 caracteres.
     * @param string $value
     */
    public function setEmisorSello(string $value): void
    {
        $this->EmisorSello = mb_substr($value, 0, 70);
    }
}
