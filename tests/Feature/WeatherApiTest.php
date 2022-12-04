<?php

namespace Tests\Feature;

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
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testIfGetWeatherEndpointWorks()
    {
        // Here we can use the same HTTP Facade to "catch" the request to the external endpoint and return our own "mocked" response
        Http::fake([
            'https://wttr.in/Wrocław?format=j1' => Http::response([
                'current_condition' => [
                    'FeelsLikeC' => '-5',
                    'temp_C' => '-1',
                    'pressure' => '1032',
                    'windspeedKmph' => '15',
                ],
            ], 200)
        ]);

        // Now we can make our assertions that the endpoint will provide us with the data we expect
        dd($this->json('get', 'api/get-weather?city=Wrocław'))
            ->assertOk()
            ->assertJson(fn(AssertableJson $json) =>
            $json->where('feelsLike', '-2')
                ->where('temperature', '-1')
                ->where('pressure', '1032')
                ->where('windspeedKmph', '15')
                ->etc());
    }
}
