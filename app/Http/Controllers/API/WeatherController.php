<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Contracts\WeatherRepositoryContract;
use App\ExternalAPI\Weather\WeatherContext;
use App\Http\Controllers\Controller;
use App\Http\Requests\WeatherRequest;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    /**
     * expires after 10 min
     */
    const EXPIRES_AFTER = 600;

    private WeatherContext $weatherContext;
    private WeatherRepositoryContract $weatherRepository;

    public function __construct(
        WeatherContext $weatherContext,
        WeatherRepositoryContract $weatherRepository
    )
    {
        $this->weatherContext = $weatherContext;
        $this->weatherRepository = $weatherRepository;
    }

    public function getWeather(WeatherRequest $request): JsonResponse
    {
        $temperature = Cache::get($request->latitude . '.' . $request->longitude);

        if (!$temperature) {
            $temperature = (new WeatherService($this->weatherContext))->getTemperature(
                (float) $request->latitude,
                (float) $request->longitude
            );

//            $this->weatherRepository->store([...$request->getData(), ...['temperature' => $temperature]]);
            $this->weatherRepository->store(array_merge($request->getData(), ['temperature' => $temperature]));
            Cache::add($request->latitude . '.' . $request->longitude, $temperature, self::EXPIRES_AFTER);
        }

        return response()->json(['temperature' => $temperature]);
    }
}
