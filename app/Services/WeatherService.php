<?php

namespace App\Services;

use App\Domain\ResultRepository;
use App\Exceptions\CoordinatesException;
use App\Interfaces\WeatherProviderInterface;
use App\WeatherProviders\MetNo;
use App\WeatherProviders\OpenMeteo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Cache;
use Spatie\Geocoder\Facades\Geocoder;

class WeatherService
{

    /**
     * @var WeatherProviderInterface[] $providers
     */
    public const PROVIDERS = [
        MetNo::class,
        OpenMeteo::class,
    ];

    public function __construct(private readonly ResultRepository $resultRepository)
    {
    }

    /**
     * @throws CoordinatesException
     */
    public function getWeather(string $address): SupportCollection
    {
        $coordinates = Geocoder::getCoordinatesForAddress($address);

        if (empty($coordinates) || !isset($coordinates['lat'], $coordinates['lng'])) {
            throw new CoordinatesException();
        }

        $results = collect();

        foreach (self::PROVIDERS as $providerClass) {

            $provider = new ($providerClass)();

            $weather = $provider->getWeather($coordinates['lat'], $coordinates['lng']);

            if ($weather) {
                $results->push($weather->toArray());
            }

            unset($provider);
        }

        $results->push([
            'provider' => 'Average',
            'temperature' => $results->avg('temperature') ?? 0,
            'wind_speed' => $results->avg('wind_speed') ?? 0,
        ]);

        $populars = Cache::get('popular_addresses', collect())->push($address)->unique()->slice(0, 10);
        Cache::put('popular_addresses', $populars, now()->addMonth());

        $this->resultRepository->save($results->toArray());

        return $results;
    }

    public function getPopularAddresses()
    {
        return Cache::get('popular_addresses', collect());
    }

    public function getResults(array $filters = []): Collection|array
    {
        return $this->resultRepository->get($filters);
    }
}

