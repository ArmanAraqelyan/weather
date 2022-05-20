<?php

declare(strict_types=1);

namespace App\Contracts;

interface WeatherRepositoryContract
{
    public function store(array $weatherDetails);
}
