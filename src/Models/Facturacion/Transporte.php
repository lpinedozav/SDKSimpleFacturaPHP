<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Transporte
{
    /**
     * Patente del vehículo que transporta los bienes.
     * @var string|null
     */
    public ?string $Patente = null;

    /**
     * Rut del transportista.
     * @var string|null
     */
    public ?string $RUTTrans = null;

    /**
     * Chofer del transporte.
     * @var Chofer|null
     */
    public ?Chofer $Chofer = null;

    /**
     * Dirección de destino.
     * @var string|null
     */
    private ?string $DirDest = null;

    /**
     * Comuna de destino.
     * @var string|null
     */
    public ?string $CmnaDest = null;

    /**
     * Ciudad de destino.
     * @var string|null
     */
    public ?string $CiudadDest = null;

    /**
     * Aduana (Documentos de exportación y guías de despacho).
     * @var Aduana|null
     */
    public ?Aduana $Aduana = null;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->Patente = null;
        $this->RUTTrans = null;
        $this->Chofer = null;
        $this->DirDest = null;
        $this->CmnaDest = null;
        $this->CiudadDest = null;
        $this->Aduana = null;
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

    // Métodos "getters" y "setters" para las propiedades privadas con truncamiento.

    public function getPatente(): ?string
    {
        return $this->Patente;
    }

    public function setPatente(?string $value): void
    {
        $this->Patente = $this->truncate($value, 8);
    }

    public function getDirDest(): ?string
    {
        return $this->DirDest;
    }

    public function setDirDest(?string $value): void
    {
        $this->DirDest = $this->truncate($value, 70);
    }
}
