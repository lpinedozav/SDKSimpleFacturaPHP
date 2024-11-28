<?php

namespace SDKSimpleFactura\Models\Response;

class ApiResponse
{
    /**
     * Indica si la operación fue exitosa.
     * @var bool
     */
    public bool $IsSuccess;

    /**
     * Código de estado de la respuesta.
     * @var int
     */
    public int $StatusCode;

    /**
     * Datos de la respuesta.
     * @var mixed|null
     */
    public $Data;

    /**
     * Errores de la operación, si los hubiera.
     * @var string
     */
    public string $Errores;

    /**
     * Constructor para inicializar valores predeterminados.
     *
     * @param bool $isSuccess
     * @param int $statusCode
     * @param mixed|null $data
     * @param string $errores
     */
    public function __construct(bool $isSuccess = false, int $statusCode = 0, $data = null, string $errores = '')
    {
        $this->IsSuccess = $isSuccess;
        $this->StatusCode = $statusCode;
        $this->Data = $data;
        $this->Errores = $errores;
    }
}
