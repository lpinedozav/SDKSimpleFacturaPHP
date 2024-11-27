<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Extranjero
{
    /**
     * Número identificador del receptor extranjero.
     * @var string
     */
    private string $NumId;

    /**
     * Nacionalidad del receptor extranjero Enum.
     * @var string
     */
    public string $Nacionalidad;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->NumId = '';
        $this->Nacionalidad = 'NotSet'; // Valor predeterminado según enumeración
    }

    /**
     * Getter para NumId.
     * @return string
     */
    public function getNumId(): string
    {
        return $this->NumId;
    }

    /**
     * Setter para NumId con truncamiento.
     * @param string $value
     * @return void
     */
    public function setNumId(string $value): void
    {
        $this->NumId = $this->truncate($value, 20);
    }

    /**
     * Trunca una cadena al tamaño máximo especificado.
     * @param string $string
     * @param int $maxLength
     * @return string
     */
    private function truncate(string $string, int $maxLength): string
    {
        return mb_substr($string, 0, $maxLength);
    }
}
