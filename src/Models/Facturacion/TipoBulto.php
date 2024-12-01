<?php

namespace SDKSimpleFactura\Models\Facturacion;

use SDKSimpleFactura\Enum\TipoBulto as TipoBultoEnum;

class TipoBulto
{
    /**
     * Código según tabla "Tipos de bultos" de Aduana Enum.
     * @var TipoBultoEnum
     */
    public ?TipoBultoEnum $CodTpoBultos;

    /**
     * Cantidad de Bultos.
     * @var int
     */
    public ?int $CantBultos;

    /**
     * Identificación de marcas, cuando es distinto de contenedor.
     * @var string
     */
    public ?string $Marcas;

    /**
     * Se utiliza cuando el tipo de bulto es contenedor.
     * @var string
     */
    public ?string $IdContainer;

    /**
     * Sello contenedor, con dígito verificador.
     * @var string
     */
    public ?string $Sello;

    /**
     * Nombre emisor sello.
     * @var string
     */
    public ?string $EmisorSello;

    public function __construct(
        ?TipoBultoEnum $CodTpoBultos = null,
        ?int $CantBultos = null,
        ?string $Marcas = null,
        ?string $IdContainer = null,
        ?string $Sello = null,
        ?string $EmisorSello = null
    ) {
        $this->CodTpoBultos = $CodTpoBultos;
        $this->CantBultos = $CantBultos;
        $this->Marcas = $Marcas;
        $this->IdContainer = $IdContainer;
        $this->Sello = $Sello;
        $this->EmisorSello = $EmisorSello;
    }
}
