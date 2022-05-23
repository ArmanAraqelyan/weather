<?php

declare(strict_types=1);

namespace App\Contracts;

interface LoggableContract
{
    public function log(string $channel, string $message): void;
}
