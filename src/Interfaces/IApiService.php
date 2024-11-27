<?php
// src/Interfaces/IApiService.php
namespace SDKSimpleFactura\Interfaces;

interface IApiService
{
    public function postAsync(string $url, $request);
    public function postForByteArrayAsync(string $url, $request);
}
