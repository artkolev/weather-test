<?php

namespace App\Domain\Contracts;

interface ResultContract
{
    public const TABLE = 'results';

    public const FILLABLE = [
        self::PROVIDER,
        self::TEMPERATURE,
        self::WIND_SPEED,
    ];

    public const PROVIDER = 'provider';
    public const TEMPERATURE = 'temperature';
    public const WIND_SPEED = 'wind_speed';

    public const CREATED_AT = 'created_at';
}
