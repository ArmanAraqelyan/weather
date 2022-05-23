<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait LoggerTrait
{
    public function log(string $channel, string $message): void
    {
        Log::channel($channel)->info($message);
    }
}
