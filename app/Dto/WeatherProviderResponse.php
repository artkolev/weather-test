<?php

namespace App\Dto;

class WeatherProviderResponse
{
    public string $provider;
    private float $temperature;
    private float $windSpeed;

    public function __construct(string $provider, float $temperature, float $windSpeed)
    {
        $this->provider = $provider;
        $this->temperature = $temperature;
        $this->windSpeed = $windSpeed;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @param float $temperature
     *
     * @return WeatherProviderResponse
     */
    public function setTemperature(float $temperature): WeatherProviderResponse
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * @return float
     */
    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    /**
     * @param float $windSpeed
     *
     * @return WeatherProviderResponse
     */
    public function setWindSpeed(float $windSpeed): WeatherProviderResponse
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'temperature' => $this->temperature,
            'wind_speed' => $this->windSpeed,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     *
     * @return WeatherProviderResponse
     */
    public function setProvider(string $provider): WeatherProviderResponse
    {
        $this->provider = $provider;

        return $this;
    }
}
