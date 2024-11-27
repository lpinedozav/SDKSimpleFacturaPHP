<?php

namespace SdkSimpleFactura\Models\Response;

class Response
{
    public int $Status;
    public string $Message;
    public $Data; // Puede ser de cualquier tipo
    public array $Errors;

    public function __construct(int $status, $data = null, string $message = '', array $errors = [])
    {
        $this->Status = $status;
        $this->Data = $data;
        $this->Message = $message;
        $this->Errors = $errors;
    }
}
