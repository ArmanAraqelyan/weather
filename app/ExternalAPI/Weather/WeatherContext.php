<?php

declare(strict_types=1);

namespace App\ExternalAPI\Weather;

use App\Contracts\WeatherContract;

class WeatherContext
{
    /**
     * @var WeatherContract
     */
    public WeatherContract $strategy;

    /**
     * @param WeatherContract $weatherStrategy
     * @return void
     */
    public function setStrategy(WeatherContract $weatherStrategy): void
    {
        $this->strategy = $weatherStrategy;
    }

    /**
     * @return bool
     */
    public function apiRequest(): bool
    {
        return $this->strategy->makeRequest();
    }

}
