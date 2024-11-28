<?php
// src/Interfaces/IApiService.php
namespace SDKSimpleFactura\Interfaces;

use GuzzleHttp\Promise\PromiseInterface;

interface IApiService
{
    public function PostAsync(string $url, $request, string $responseClass): PromiseInterface;
    public function PostForByteArrayAsync(string $url, $request): PromiseInterface;

    public function PostAsyncMultipart(string $url, array $multipart): PromiseInterface;
}
