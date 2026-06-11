<?php

namespace SDKSimpleFactura\Models\Response;

class TokenResponse
{
    public ?string $AccessToken;
    public ?string $TokenType;
    public ?int $ExpiresIn;
    public ?string $ExpiresAt;

    public function __construct(
        ?string $accessToken = null,
        ?string $tokenType = null,
        ?int $expiresIn = null,
        ?string $expiresAt = null
    ) {
        $this->AccessToken = $accessToken;
        $this->TokenType = $tokenType;
        $this->ExpiresIn = $expiresIn;
        $this->ExpiresAt = $expiresAt;
    }
}
