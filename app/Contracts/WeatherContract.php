<?php

declare(strict_types=1);

namespace App\Contracts;

interface WeatherContract
{
    /**
     * @return float
     */
    public function getTemperature(): float;
}
