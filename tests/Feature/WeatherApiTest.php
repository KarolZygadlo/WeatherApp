<?php

namespace Tests\Feature;

use App\DataTransferObjects\WeatherData;
use App\Services\WeatherService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class WeatherApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->mock(WeatherService::class)
            ->shouldReceive("getWeatherByCity")
            ->once()
            ->andReturn(
                new WeatherData("-5", '4', '1021', '26'),
            );
    }
}
