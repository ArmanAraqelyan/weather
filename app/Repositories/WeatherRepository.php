<?php

namespace App\Repositories;

use App\Contracts\WeatherRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\Weather;

class WeatherRepository implements WeatherRepositoryContract
{
    protected Model $model;

    public function __construct(Weather $weather)
    {
        $this->model = $weather;
    }

    /**
     * @param array $weatherDetails
     * @return Model
     */
    public function store(array $weatherDetails): Model
    {
        return $this->model->create($weatherDetails);
    }
}
