<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\WeatherServiceContract;
use App\Dto\DestinationDto;
use App\ExternalAPI\Weather\OpenWeatherMapApi;
use App\ExternalAPI\Weather\WeatherBitApi;
use App\ExternalAPI\Weather\WeatherContext;

class WeatherService implements WeatherServiceContract
{
    private array $weatherApis = [
        OpenWeatherMapApi::class,
        WeatherBitApi::class
    ];
    private array $temperatures;
    private WeatherContext $weatherContext;

    /**
     * @param WeatherContext $weatherContext
     */
    public function __construct(WeatherContext $weatherContext)
    {
        $this->weatherContext = $weatherContext;
    }

    /**
     * @param DestinationDto $destinationDto
     * @return float
     */
    public function getTemperature(DestinationDto $destinationDto): float
    {
        foreach ($this->weatherApis as $weatherApi) {
            $this->weatherContext->setWeatherApi(new $weatherApi($destinationDto->getLatitude(), $destinationDto->getLongitude()));
            if ($this->weatherContext->apiRequest()) {
                $this->temperatures[] = $this->weatherContext->weatherApi->getTemperature();
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
