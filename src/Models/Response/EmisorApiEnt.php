<?php

namespace SDKSimpleFactura\Models\Response;

class EmisorApiEnt
{
    /**
     * RUT del emisor.
     * @var string
     */
    public string $Rut;

    /**
     * Razón social del emisor.
     * @var string
     */
    public string $RazonSocial;

    /**
     * Giro comercial del emisor.
     * @var string
     */
    public string $Giro;

    /**
     * Dirección particular del emisor.
     * @var string|null
     */
    public ?string $DirPart = null;

    /**
     * Dirección para facturación del emisor.
     * @var string
     */
    public string $DirFact;

    /**
     * Correo particular del emisor.
     * @var string|null
     */
    public ?string $CorreoPar = null;

    /**
     * Correo para facturación del emisor.
     * @var string
     */
    public string $CorreoFact;

    /**
     * Ciudad del emisor.
     * @var string|null
     */
    public ?string $Ciudad = null;

    /**
     * Comuna del emisor.
     * @var string
     */
    public string $Comuna;

    /**
     * Número de resolución.
     * @var int
     */
    public int $NroResol;

    /**
     * Unidad del SII (opcional).
     * @var string|null
     */
    public ?string $UnidadSII = null;

    /**
     * Fecha de la resolución.
     * @var string
     */
    public string $FechaResol;

    /**
     * Ambiente del emisor.
     * @var int
     */
    public int $Ambiente;

    /**
     * Teléfono del emisor.
     * @var float
     */
    public float $Telefono;

    /**
     * RUT del representante legal.
     * @var string
     */
    public string $RutRepresentanteLegal;

    /**
     * Lista de actividades económicas del emisor.
     * @var ActividadeconomicaApiEnt[]
     */
    public array $ActividadesEconomicas = [];

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct()
    {
        $this->ActividadesEconomicas = [];
    }
}
