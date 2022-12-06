<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\WeatherService;
use Illuminate\Console\Command;
use Throwable;

class GetWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "get:weather";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Checking the weather for the selected city.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(WeatherService $weatherService)
    {
        $city = $this->ask("For which city do you want to check the weather ?");

        try {
            $data = $weatherService->getWeatherByCity($city);
            $this->info(
                "The weather for the: " . $city . "\n" .
                "Temperature is : " . $data->temperature . "°C" . "\n" .
                "Feeling Temperature is : " . $data->feelsLike . "°C" . "\n" .
                "The Pressure is : " . $data->pressure . "hPa" . "\n" .
                "The WindSpeed is : " . $data->windspeed . "km/h",
            );
        } catch (Throwable $e) {
            $this->info("We have problems with external API, check again later.");
        }

    }
}
