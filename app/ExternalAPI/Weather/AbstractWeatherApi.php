<?php

declare(strict_types=1);

namespace App\ExternalAPI\Weather;

use App\Contracts\LoggableContract;
use App\Contracts\WeatherApiContract;
use App\Traits\LoggerTrait;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class AbstractWeatherApi implements WeatherApiContract, LoggableContract
{
    use LoggerTrait;

    protected string $url;
    protected float $latitude;
    protected float $longitude;
    protected Response $result;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude  = $latitude;
        $this->longitude = $longitude;
        $this->setUrl();
    }

    /**
     * @return void
     */
    abstract protected function setUrl(): void;

    /**
     * @return bool
     */
    public function makeRequest(): bool
    {
        try {
            $this->result = Http::get($this->url);
            if ($this->result->successful())
                return true;

            $errorMessage = $this->result->toException()->getMessage();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }
        $this->log('API_exception', $errorMessage);

        return false;
    }
}
