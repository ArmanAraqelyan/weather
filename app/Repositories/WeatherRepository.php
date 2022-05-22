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
     * @return mixed
     */
    public function store(array $weatherDetails)
    {
        return $this->model->create($weatherDetails);
    }
}
