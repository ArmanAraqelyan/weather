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
    private WeatherContext $weatherContext;
    private WeatherRepositoryContract $weatherRepository;

    /**
     * @param WeatherContext $weatherContext
     * @param WeatherRepositoryContract $weatherRepository
     */
    public function __construct(
        WeatherContext $weatherContext,
        WeatherRepositoryContract $weatherRepository
    )
    {
        $this->weatherContext = $weatherContext;
        $this->weatherRepository = $weatherRepository;
    }

    /**
     * @param WeatherRequest $request
     * @return JsonResponse
     */
    public function getWeather(WeatherRequest $request): JsonResponse
    {
        $temperature = Cache::get($request->latitude . '.' . $request->longitude);

        if (!$temperature) {
            //TODO Cache::pull() - we had this before
            $temperature = (new WeatherService($this->weatherContext))->getTemperature(
                (float) $request->latitude,
                (float) $request->longitude
            );

//            $this->weatherRepository->store([...$request->getData(), ...['temperature' => $temperature]]);
            $this->weatherRepository->store(array_merge($request->getData(), ['temperature' => $temperature]));
            Cache::add($request->latitude . '.' . $request->longitude, $temperature, 600); // expires after 10 min
        }

        return response()->json(['temperature' => $temperature]);
    }
}
