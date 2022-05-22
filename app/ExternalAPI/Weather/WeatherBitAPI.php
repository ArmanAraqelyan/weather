<?php

declare(strict_types=1);

namespace App\ExternalAPI\Weather;


class WeatherBitAPI extends AbstractWeatherAPI
{
    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return (float) $this->result->json()['data'][0]['temp'];
    }

    /**
     * @return void
     */
    protected function setUrl(): void
    {
        $this->url = env('WEATHERBIT_API_URL') . 'current?lat=' . $this->latitude . "&lon=" . $this->longitude . "&key=" . env('WEATHERBIT_KEY') . "&include=minutely";
    }
}
