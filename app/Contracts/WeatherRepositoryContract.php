<?php

declare(strict_types=1);

namespace App\Contracts;

interface WeatherRepositoryContract
{
    /**
     * @param array $weatherDetails
     */
    public function store(array $weatherDetails);
}
