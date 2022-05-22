<?php

declare(strict_types=1);

namespace App\Services;

use App\ExternalAPI\Weather\OpenWeatherMapAPI;
use App\ExternalAPI\Weather\WeatherBitAPI;
use App\ExternalAPI\Weather\WeatherContext;

class WeatherService
{
    /**
     * @var array|string[]
     */
    private array $weatherAPIs = [
        OpenWeatherMapAPI::class,
        WeatherBitAPI::class
    ];
    /**
     * @var array
     */
    private array $temperatures;

    /**
     * @var WeatherContext
     */
    private WeatherContext $weatherContext;

    /**
     * @param WeatherContext $weatherContext
     */
    public function __construct(WeatherContext $weatherContext)
    {
        $this->weatherContext = $weatherContext;
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @return float
     */
    public function getTemperature(float $latitude, float $longitude): float
    {
        foreach ($this->weatherAPIs as $weatherAPI) {
            $this->weatherContext->setStrategy(new $weatherAPI($latitude, $longitude));
            if ($this->weatherContext->apiRequest()) {
                $this->temperatures[] = $this->weatherContext->strategy->getTemperature();
            }
        }
        return $this->getTemperatureAverage();
    }

    /**
     * @return float
     */
    private function getTemperatureAverage(): float
    {
        return round(array_sum($this->temperatures) / count($this->temperatures), 1);
    }
}
