<?php

namespace App\Domain;

use App\Domain\Contracts\ResultContract;
use App\Models\Result;
use Illuminate\Database\Eloquent\Collection;

class ResultRepository
{
    public function get(array $filters = []): Collection|array
    {
        $results = Result::query();

        if (isset($filters['provider'])) {
            $results->where(ResultContract::PROVIDER, $filters['provider']);
        }

        if (isset($filters['temperature'])) {
            $results->where(ResultContract::TEMPERATURE, $filters['temperature']);
        }

        if (isset($filters['wind_speed'])) {
            $results->where(ResultContract::WIND_SPEED, $filters['wind_speed']);
        }

        if (isset($filters['created_at'])) {
            $results->whereBetween(ResultContract::CREATED_AT, $filters['created_at']);
        }

        return $results->get();
    }
    public function save(array $data): void
    {
        Result::query()->create($data);
    }
}
