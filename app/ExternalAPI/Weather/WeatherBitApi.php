<?php

declare(strict_types=1);

namespace App\ExternalAPI\Weather;

class WeatherBitApi extends AbstractWeatherApi
{
    public function getTemperature(): float
    {
        return (float) $this->result->json()['data'][0]['temp'];
    }

    protected function setUrl(): void
    {
        $this->url = env('WEATHERBIT_API_URL') . 'current?lat=' . $this->latitude . "&lon=" . $this->longitude . "&key=" . env('WEATHERBIT_KEY') . "&include=minutely";
    }
}
