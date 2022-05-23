<?php

declare(strict_types=1);

namespace App\ExternalAPI\Weather;

use App\Contracts\WeatherApiContract;

class WeatherContext
{
    public WeatherApiContract $weatherApi;

    /**
     * @param WeatherApiContract $weatherApi
     */
    public function setWeatherApi(WeatherApiContract $weatherApi): void
    {
        $this->weatherApi = $weatherApi;
    }

    /**
     * @return bool
     */
    public function apiRequest(): bool
    {
        return $this->weatherApi->makeRequest();
    }
}
