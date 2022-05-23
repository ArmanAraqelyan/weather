<?php

declare(strict_types=1);

namespace App\Contracts;

interface LoggableContract
{
    /**
     * @param string $channel
     * @param string $message
     */
    public function log(string $channel, string $message): void;
}
