<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface WeatherRepositoryContract
{
    /**
     * @param array $weatherDetails
     * @return Model
     */
    public function store(array $weatherDetails): Model;
}
