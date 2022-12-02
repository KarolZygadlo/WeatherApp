<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

class WeatherData
{
    public function __construct(
        public readonly string $feelsLike,
        public readonly string $temperature,
        public readonly string $pressure,
        public readonly string $windspeed,
    ) {

    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data[0]['FeelsLikeC'],
            $data[0]['temp_C'],
            $data[0]['pressure'],
            $data[0]['windspeedKmph'],
        );

    }
}
