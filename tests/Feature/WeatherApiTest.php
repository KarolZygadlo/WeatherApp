<?php

namespace Tests\Feature;

use App\DataTransferObjects\WeatherData;
use App\Services\WeatherService;
use Tests\TestCase;

class WeatherApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSetUpMockRepository()
    {
        $this->mock(WeatherService::class)
            ->shouldReceive("getWeatherByCity")
            ->once()
            ->andReturn(
                new WeatherData("-5", '4', '1021', '26'),
            );

        $response = $this->get('/api/get-weather?city=Wrocław');
    }
}
