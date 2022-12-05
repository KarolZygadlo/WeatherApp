<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\DataTransferObjects\WeatherData;
use App\Services\WeatherService;
use Tests\TestCase;

class ApplicationViewsTest extends TestCase
{
    public function testUserCanRenderHomePage(): void
    {
        $response = $this->get("/");

        $response->assertOk();
        $response->assertViewIs("home");
    }

    public function testUserCanRenderCityReportPage(): void
    {
        $this->mock(WeatherService::class)
            ->shouldReceive("getWeatherByCity")
            ->once()
            ->andReturn(
                new WeatherData("-5", "4", "1021", "26"),
            );

        $response = $this->json("get", "search?city=Wrocław");
        $response->assertOk();
        $response->assertViewIs("cityReport");
    }
}
