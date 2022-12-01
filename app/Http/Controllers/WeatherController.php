<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(WeatherService $weatherService)
    {
        $weatherData = $weatherService->getWeatherByCity($_GET['city']);
        dd($weatherData);
    }
}
