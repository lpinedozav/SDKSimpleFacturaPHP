<?php

namespace SDKSimpleFactura\Models\Response;

/**
 * Tiempo restante de expiración del token (/token/expire).
 */
class TokenExpireEnt
{
    public ?int $expiresIn;
    public ?string $expiresAt;

    public function __construct(
        ?int $expiresIn = null,
        ?string $expiresAt = null
    ) {
        $this->expiresIn = $expiresIn;
        $this->expiresAt = $expiresAt;
    }
}
