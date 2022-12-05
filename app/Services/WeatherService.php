<?php

declare(strict_types=1);

namespace App\Services;

use App\DataTransferObjects\WeatherData;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    /**
     * @throws RequestException
     */
    public function getWeatherByCity(string $city): Object
    {
        $response = Http::get("https://wttr.in/" . $city . "?format=j1")->throw();
        return WeatherData::fromArray($response->json("current_condition"));
    }
}
