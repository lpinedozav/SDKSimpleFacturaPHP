<?php

namespace SDKSimpleFactura\Models\Response;

class InvoiceData
{
    private int $TipoDTE;
    private string $RUTEmisor;
    private string $RUTReceptor;
    private int $Folio;
    private string $FechaEmision;
    private float $Total;

    // Constructor opcional para inicializar las propiedades
    public function __construct(
        int $TipoDTE,
        string $RUTEmisor,
        string $RUTReceptor,
        int $Folio,
        string $FechaEmision,
        float $Total
    ) {
        $this->TipoDTE = $TipoDTE;
        $this->RUTEmisor = $RUTEmisor;
        $this->RUTReceptor = $RUTReceptor;
        $this->Folio = $Folio;
        $this->FechaEmision = $FechaEmision;
        $this->Total = $Total;
    }

    // Getters y Setters
    public function getTipoDTE(): int
    {
        return $this->TipoDTE;
    }

    public function setTipoDTE(int $TipoDTE): void
    {
        $this->TipoDTE = $TipoDTE;
    }

    public function getRUTEmisor(): string
    {
        return $this->RUTEmisor;
    }

    public function setRUTEmisor(string $RUTEmisor): void
    {
        $this->RUTEmisor = $RUTEmisor;
    }

    public function getRUTReceptor(): string
    {
        return $this->RUTReceptor;
    }

    public function setRUTReceptor(string $RUTReceptor): void
    {
        $this->RUTReceptor = $RUTReceptor;
    }

    public function getFolio(): int
    {
        return $this->Folio;
    }

    public function setFolio(int $Folio): void
    {
        $this->Folio = $Folio;
    }

    public function getFechaEmision(): string
    {
        return $this->FechaEmision;
    }

    public function setFechaEmision(string $FechaEmision): void
    {
        $this->FechaEmision = $FechaEmision;
    }

    public function getTotal(): float
    {
        return $this->Total;
    }

    public function setTotal(float $Total): void
    {
        $this->Total = $Total;
    }
}
