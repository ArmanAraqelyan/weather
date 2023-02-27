<?php

namespace App\Contracts;

use App\Dto\DestinationDto;

interface WeatherServiceContract
{
    public function getTemperature(DestinationDto $destinationDto): float;
}
