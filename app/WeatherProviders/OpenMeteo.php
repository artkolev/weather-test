<?php

namespace App\WeatherProviders;

use App\Dto\WeatherProviderResponse;
use App\Interfaces\WeatherProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenMeteo implements WeatherProviderInterface
{
    private const NAME = 'OpenMeteo';
    private const API_URL = 'https://api.open-meteo.com/v1/forecast';

    public function getWeather(float $lat, float $lon): ?WeatherProviderResponse
    {
        $response = Http::dd()->get(self::API_URL, [
            'latitude' => $lat,
            'longitude' => $lon,
            'current_weather' => true,
        ]);

        if ($response->failed()) {
            Log::error('OpenMeteo API error: ' . $response->body());

            return null;
        }

        return new WeatherProviderResponse(
            self::NAME,
            $response['current_weather']['temperature'],
            $response['current_weather']['windspeed'],
        );
    }
}
