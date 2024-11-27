<?php

namespace SDKSimpleFactura\Models\Facturacion;

class Chofer
{
    /**
     * Rut del chofer.
     * @var string
     */
    public string $RUTChofer;

    /**
     * Nombre del chofer.
     * @var string
     */
    private string $NombreChofer;

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->RUTChofer = '';
        $this->NombreChofer = '';
    }

    /**
     * Getter para el nombre del chofer.
     * @return string
     */
    public function getNombreChofer(): string
    {
        return $this->NombreChofer;
    }

    /**
     * Setter para el nombre del chofer con truncamiento.
     * @param string $value
     * @return void
     */
    public function setNombreChofer(string $value): void
    {
        $this->NombreChofer = $this->truncate($value, maxLength: 30);
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
