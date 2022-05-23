<?php

declare(strict_types=1);

namespace App\Services;

use App\ExternalAPI\Weather\OpenWeatherMapApi;
use App\ExternalAPI\Weather\WeatherBitApi;
use App\ExternalAPI\Weather\WeatherContext;

class WeatherService
{
    private array $weatherApis = [
        OpenWeatherMapApi::class,
        WeatherBitApi::class
    ];
    private array $temperatures;
    private WeatherContext $weatherContext;

    public function __construct(WeatherContext $weatherContext)
    {
        $this->weatherContext = $weatherContext;
    }

    public function getTemperature(float $latitude, float $longitude): float
    {
        foreach ($this->weatherApis as $weatherApi) {
            $this->weatherContext->setWeatherApi(new $weatherApi($latitude, $longitude));
            if ($this->weatherContext->apiRequest()) {
                $this->temperatures[] = $this->weatherContext->weatherApi->getTemperature();
            }
        }
        return $this->getTemperatureAverage();
    }

    private function getTemperatureAverage(): float
    {
        return round(array_sum($this->temperatures) / count($this->temperatures), 1);
    }
}
