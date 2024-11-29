<?php

namespace SDKSimpleFactura\Models\Response;

class EmisorApiEnt
{
    public ?string $rut;
    public ?string $razonSocial;
    public ?string $giro;
    public ?string $dirPart = null;
    public ?string $dirFact;
    public ?string $correoPar = null;
    public ?string $correoFact;
    public ?string $ciudad = null;
    public ?string $comuna;
    public ?int $nroResol;
    public ?string $unidadSII = null;
    public ?string $fechaResol;
    public ?int $ambiente;
    public ?float $telefono;
    public ?string $rutRepresentanteLegal;
    /**
     * Lista de actividades económicas del emisor.
     * @var ActividadeconomicaApiEnt[]
     */
    public array $actividadesEconomicas = [];

    /**
     * Constructor para inicializar valores predeterminados.
     */
    public function __construct(
        ?string $rut = null,
        ?string $razonSocial = null,
        ?string $giro = null,
        ?string $dirFact = null,
        ?string $correoFact = null,
        ?string $comuna = null,
        ?int $nroResol = null,
        ?string $fechaResol = null,
        ?int $ambiente = null,
        ?float $telefono = null,
        ?string $rutRepresentanteLegal = null,
        array $actividadesEconomicas = []
    ) {
        $this->rut = $rut;
        $this->razonSocial = $razonSocial;
        $this->giro = $giro;
        $this->dirFact = $dirFact;
        $this->correoFact = $correoFact;
        $this->comuna = $comuna;
        $this->nroResol = $nroResol;
        $this->fechaResol = $fechaResol;
        $this->ambiente = $ambiente;
        $this->telefono = $telefono;
        $this->rutRepresentanteLegal = $rutRepresentanteLegal;
        $this->actividadesEconomicas = $actividadesEconomicas;
    }
}
