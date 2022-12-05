<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use App\DataTransferObjects\WeatherData;

class WeatherService
{
    /**
     * @throws RequestException
     */
    public function getWeatherByCity(string $city): Object
    {
        $response = Http::get('https://wttr.in/' . $city . '?format=j1')->throw();
        return WeatherData::fromArray($response->json('current_condition'));
    }
}
