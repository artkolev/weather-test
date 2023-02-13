<?php

namespace App\Interfaces;

use App\Dto\WeatherProviderResponse;

interface WeatherProviderInterface
{
    public function getWeather(float $lat, float $lon): ?WeatherProviderResponse;
}
