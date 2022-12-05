<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

class WeatherApiController extends Controller
{
    public function index(WeatherRequest $request, WeatherService $weatherService): JsonResponse
    {
        $data = $weatherService->getWeatherByCity($request->get("city"));

        return response()->json($data);
    }
}
