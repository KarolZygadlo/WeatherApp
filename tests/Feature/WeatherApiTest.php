<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\DataTransferObjects\WeatherData;
use App\Services\WeatherService;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class WeatherApiTest extends TestCase
{
    public function mockWeatherServiceData()
    {
        return $this->mock(WeatherService::class)
            ->shouldReceive("getWeatherByCity")
            ->once()
            ->andReturn(
                new WeatherData("-5", "4", "1021", "26"),
            );
    }

    /**
     * A basic feature test example.
     */
    public function testSetUpMockToCheckIfEndpointReturnCorrectData(): void
    {
        $this->mockWeatherServiceData();

        $this->json("get", "api/get-weather?city=Wrocław")
            ->assertJson(fn(AssertableJson $json) => $json->where("feelsLike", "-5")
                ->where("temperature", "4")
                ->where("pressure", "1021")
                ->where("windspeed", "26")
                ->etc(), );
    }

    public function testWeatherJsonStructure(): void
    {
        $this->mockWeatherServiceData();

        $this->json("get", "api/get-weather?city=Wrocław")
            ->assertJsonStructure([
                "feelsLike",
                "temperature",
                "pressure",
                "windspeed",
            ]);
    }

    public function testRequiredCity(): void
    {
        $this->json("get", "api/get-weather?city=")
            ->assertStatus(422)
            ->assertJson([
                "message" => "The city name is required.",
                "errors" => [
                    "city" => ["The city name is required."],
                ],
            ]);
    }
}
