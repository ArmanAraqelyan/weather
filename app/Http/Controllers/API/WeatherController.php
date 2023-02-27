<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Contracts\WeatherRepositoryContract;
use App\Contracts\WeatherServiceContract;
use App\Dto\DestinationDto;
use App\Dto\WeatherStoreDto;
use App\ExternalAPI\Weather\WeatherContext;
use App\Http\Controllers\Controller;
use App\Http\Requests\WeatherRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    /**
     * expires after 10 min
     */
    const EXPIRES_AFTER = 600;

    public function __construct(
        private WeatherContext $weatherContext,
        private WeatherRepositoryContract $weatherRepository,
        private WeatherServiceContract $weatherService
    ) {}

    /**
     * @param WeatherRequest $request
     * @return JsonResponse
     */
    public function getWeather(WeatherRequest $request): JsonResponse
    {
        $destination = ['latitude' => (float) $request->latitude, 'longitude' => (float) $request->longitude];
        $temperature = Cache::get($destination['latitude'] . '.' . $destination['longitude']);

        if (!$temperature) {
            $temperature = (($this->weatherService)($this->weatherContext))->getTemperature(DestinationDto::init($destination));
            $this->storeWeatherDetails(array_merge($request->getData(), ['temperature' => $temperature]));

            Cache::add($destination['latitude'] . '.' . $destination['longitude'], $temperature, self::EXPIRES_AFTER);
        }

        return response()->json(['temperature' => $temperature]);
    }

    private function storeWeatherDetails(array $weatherDetails)
    {
        $this->weatherRepository->store(WeatherStoreDto::init($weatherDetails));
    }
}
