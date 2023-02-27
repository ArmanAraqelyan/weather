<?php

namespace App\Repositories;

use App\Contracts\WeatherRepositoryContract;
use App\Dto\WeatherStoreDto;
use Illuminate\Database\Eloquent\Model;
use App\Models\Weather;

class WeatherRepository implements WeatherRepositoryContract
{
    protected Model $model;

    /**
     * @param Weather $weather
     */
    public function __construct(Weather $weather)
    {
        $this->model = $weather;
    }

    /**
     * @param WeatherStoreDto $weatherStoreDto
     * @return Model
     */
    public function store(WeatherStoreDto $weatherStoreDto): Model
    {
        return $this->model->create($weatherStoreDto->getWeatherDetails());
    }
}
