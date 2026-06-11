<?php

namespace SDKSimpleFactura\Models\Response;

class LastSyncBlock
{
    public ?string $last_Sync;
    public ?string $source;

    public function __construct(?string $last_Sync = null, ?string $source = null)
    {
        $this->last_Sync = $last_Sync;
        $this->source = $source;
    }
}
