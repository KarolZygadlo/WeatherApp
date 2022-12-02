<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

class WeatherApiController extends Controller
{
    public function index(string $city, WeatherService $weatherService)
    {
        $data = $weatherService->getWeatherByCity($city);

        return response()->json($data);
    }
}
