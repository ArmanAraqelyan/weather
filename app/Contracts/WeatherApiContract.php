<?php

declare(strict_types=1);

namespace App\Contracts;

interface WeatherApiContract
{
    /**
     * @return float
     */
    public function getTemperature(): float;
}
