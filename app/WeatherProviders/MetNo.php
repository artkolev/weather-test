<?php

namespace App\WeatherProviders;

use App\Dto\WeatherProviderResponse;
use App\Interfaces\WeatherProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MetNo implements WeatherProviderInterface
{
    private const NAME = 'MetNo';
    private const API_URL = 'https://api.met.no/weatherapi/locationforecast/2.0/complete';

    public function getWeather(float $lat, float $lon): ?WeatherProviderResponse
    {
        $response = Http::withUserAgent(Str::uuid())->get(self::API_URL, [
            'lat' => $lat,
            'lon' => $lon,
        ]);

        if ($response->failed()) {
            Log::error('MetNo API error: ' . $response->body());

            return null;
        }

        $temperature = $response['properties']['timeseries'][0]['data']['instant']['details']['air_temperature'];
        $windSpeed = $response['properties']['timeseries'][0]['data']['instant']['details']['wind_speed'];

        return new WeatherProviderResponse(self::NAME, $temperature, $windSpeed);
    }
}
