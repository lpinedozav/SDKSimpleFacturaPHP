<?php

namespace SdkSimpleFactura\Models\Request;

class DteReferenciadoExterno {
    public int $folio;
    public int $codigoTipoDte;
    public int $ambiente;

    public function __construct(int $folio, int $codigoTipoDte, int $ambiente) {
        $this->folio = $folio;
        $this->codigoTipoDte = $codigoTipoDte;
        $this->ambiente = $ambiente;
    }
}
