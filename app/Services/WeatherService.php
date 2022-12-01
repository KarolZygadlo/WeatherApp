<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeatherByCity($city)
    {
        $response =  Http::get('https://wttr.in/' . $city .  '?format=j1');

        return $response->json();

    }
}
