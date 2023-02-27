<?php

namespace App\Dto;

final class WeatherStoreDto
{
    private array $weatherDetails;

    /**
     * @return array
     */
    public function getWeatherDetails(): array
    {
        return $this->weatherDetails;
    }

    /**
     * @param array $weatherDetails
     * @return WeatherStoreDto
     */
    public function setWeatherDetails(array $weatherDetails): self
    {
        $this->weatherDetails = $weatherDetails;
        return $this;
    }

    public static function init(array $weatherDetails): self
    {
        return (new self())->setWeatherDetails($weatherDetails);
    }
}
