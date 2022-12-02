<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\DataTransferObjects\WeatherData;

class WeatherService
{
    public function getWeatherByCity(string $city): Object
    {
        $response = Http::get('https://wttr.in/' . $city . '?format=j1');
        return WeatherData::fromArray($response->json('current_condition'));
    }
}
