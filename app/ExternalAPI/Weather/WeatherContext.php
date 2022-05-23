<?php

declare(strict_types=1);

namespace App\ExternalAPI\Weather;

use App\Contracts\WeatherApiContract;

class WeatherContext
{
    public WeatherApiContract $weatherApi;

    public function setWeatherApi(WeatherApiContract $weatherApi): void
    {
        $this->weatherApi = $weatherApi;
    }

    public function apiRequest(): bool
    {
        return $this->weatherApi->makeRequest();
    }
}
