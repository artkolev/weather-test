<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CoordinatesException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticsRequest;
use App\Http\Requests\WeatherRequest;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    public function __construct(private readonly WeatherService $weatherService)
    {
    }

    /**
     * @throws CoordinatesException
     */
    public function index(WeatherRequest $request): JsonResponse
    {
        return response()->json($this->weatherService->getWeather($request->get('address')), Response::HTTP_OK);
    }

    public function popular(): JsonResponse
    {
        return response()->json($this->weatherService->getPopularAddresses(), Response::HTTP_OK);
    }

    public function results(StatisticsRequest $request): JsonResponse
    {
        return response()->json($this->weatherService->getResults($request->validated()), Response::HTTP_OK);
    }
}
