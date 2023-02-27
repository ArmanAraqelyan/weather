<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Dto\WeatherStoreDto;
use Illuminate\Database\Eloquent\Model;

interface WeatherRepositoryContract
{
    /**
     * @param WeatherStoreDto $weatherStoreDto
     * @return Model
     */
    public function store(WeatherStoreDto $weatherStoreDto): Model;
}
