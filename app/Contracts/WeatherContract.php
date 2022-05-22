<?php

declare(strict_types=1);

namespace App\Contracts;

interface WeatherContract
{
    /**
     * @return float|null
     */
    public function getTemperature(): ?float;
}
