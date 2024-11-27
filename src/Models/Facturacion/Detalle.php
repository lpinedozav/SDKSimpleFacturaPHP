<?php

namespace SDKSimpleFactura\Models\Facturacion;

use DateTime;
use SDKSimpleFactura\Enum\IndicadorFacturacionExencion;
use SDKSimpleFactura\Enum\TipoImpuesto;


class Detalle
{
    /**
     * Número secuencial de línea.
     * @var int
     */
    public int $NroLinDet;


    /** @var CodigoItem[] */
    public array $CdgItem = [];
    /**
     * Indicador de exención/facturación Enum.
     * @var IndicadorFacturacionExencion
     */
    public IndicadorFacturacionExencion $IndExe;

    /**
     * Retenedor.
     * @var Retenedor|null
     */
    public ?Retenedor $Retenedor = null;

    /**
     * Nombre del producto o servicio.
     * @var string
     */
    private string $NmbItem;

    /**
     * Descripción del ítem.
     * @var string|null
     */
    private ?string $DscItem = null;

    /**
     * Cantidad para la unidad de medida de referencia.
     * @var float
     */
    public float $QtyRef = 0.0;

    /**
     * Unidad de medida de referencia.
     * @var string
     */
    public string $UnmdRef;

    /**
     * Precio unitario de referencia para unidad de medida de referencia.
     * @var float
     */
    public float $PrcRef = 0.0;

    /**
     * Cantidad del ítem.
     * @var float
     */
    public float $QtyItem = 0.0;


    /** @var SubCantidad[] */
    public ?array $Subcantidad = [];

    /**
     * Fecha de elaboración del ítem (AAAA-MM-DD).
     * @var DateTime
     */
    public DateTime $FchElabor;

    /**
     * Fecha de vencimiento del ítem (AAAA-MM-DD).
     * @var DateTime
     */
    public DateTime $FchVencim;

    /**
     * Unidad de medida.
     * @var string
     */
    public string $UnmdItem;

    /**
     * Precio unitario del ítem.
     * @var float
     */
    public float $PrcItem = 0.0;

    /**
     * OtramonedaDetalle.
     * @var OtraMonedaDetalle|null
     */
    public ?OtraMonedaDetalle $OtrMnda = null;

    /**
     * Porcentaje de descuento.
     * @var float
     */
    public float $DescuentoPct = 0.0;

    /**
     * Monto del descuento.
     * @var int
     */
    public int $DescuentoMonto;


    /**
     * SubDescuento.
     * @var SubDescuento|null
     */
    public ?SubDescuento $SubDscto = null;

    /**
     * Porcentaje de recargo.
     * @var float
     */
    public float $RecargoPct = 0.0;

    /**
     * Monto de recargo.
     * @var int
     */
    public int $RecargoMonto;


    /**
     * SubRecargo.
     * @var SubRecargo|null
     */
    public ?SubRecargo $SubRecargo = null;


    /** @var TipoImpuesto[] */
    public ?array $CodImpAdic = [];

    /**
     * Monto por línea de detalle.
     * @var int
     */
    public int $MontoItem;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->NroLinDet = 0;
        $this->NmbItem = '';
        $this->MontoItem = 0;
        $this->IndExe = 'NotSet'; // Asumiendo que es un valor por defecto
        $this->DscItem = '';
        $this->UnmdRef = '';
        $this->UnmdItem = '';
        $this->DescuentoMonto = 0;
        $this->RecargoMonto = 0;
    }

    /**
     * Getter para NmbItem.
     * @return string
     */
    public function getNmbItem(): string
    {
        return $this->NmbItem;
    }

    /**
     * Setter para NmbItem con truncamiento.
     * @param string $value
     * @return void
     */
    public function setNmbItem(string $value): void
    {
        $this->NmbItem = $this->truncate($value, 80);
    }

    /**
     * Getter para DscItem.
     * @return string|null
     */
    public function getDscItem(): ?string
    {
        return $this->DscItem;
    }

    /**
     * Setter para DscItem con truncamiento.
     * @param string|null $value
     * @return void
     */
    public function setDscItem(?string $value): void
    {
        $this->DscItem = $this->truncate($value, 1000);
    }


    /**
     * Getter para UnmdRef.
     * @return string|null
     */
    public function getUnmdRef(): ?string
    {
        return $this->UnmdRef;
    }

    /**
     * Setter para UnmdRef con truncamiento.
     * @param string|null $value
     * @return void
     */
    public function setUnmdRef(?string $value): void
    {
        $this->UnmdRef = $this->truncate($value, 4);
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

    /**
     * Getter para FechaElaboracionString.
     * @return string
     */
    public function getFchElabor(): DateTime
    {
        return $this->FchElabor;
    }

    /**
     * Setter para FechaElaboracionString con validación.
     * @param string $value
     * @return void
     */
    public function setFchElabor(string $value): void
    {
        $this->FchElabor = $this->validateDateFormat($value) ? $value : '';
    }

    /**
     * Getter para FechaElaboracionString.
     * @return string
     */
    public function getFchVencim(): DateTime
    {
        return $this->FchVencim;
    }

    /**
     * Setter para FechaElaboracionString con validación.
     * @param string $value
     * @return void
     */
    public function setFchVencim(string $value): void
    {
        $this->FchVencim = $this->validateDateFormat($value) ? $value : '';
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
