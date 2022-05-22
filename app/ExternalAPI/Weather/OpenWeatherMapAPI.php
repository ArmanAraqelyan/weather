<?php

declare(strict_types=1);

namespace App\ExternalAPI\Weather;


class OpenWeatherMapAPI extends AbstractWeatherAPI
{
    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return (float) $this->result->json()['main']['temp'];
    }

    /**
     * @return void
     */
    protected function setUrl(): void
    {
        $this->url = env('OPENWEATHERMAP_API_URL') . 'weather?lat=' . $this->latitude . "&lon=" . $this->longitude . "&appid=" . env('OPENWEATHERMAP_KEY') . "&units=metric";
    }
}
