<?php

namespace App\Console\Commands;

use App\Models\Cities;
use App\Models\ForecastsModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life weather with our application using the Open API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument("city");

            $dbCity = Cities::where(['name' => $city])->first();

        if($dbCity === null)
        {
            $dbCity = Cities::create(['name' => $city]);
        }

        //method: Swagger Tool
        $url = env("WEATHER_API_URL")."v1/forecast.json";

        $params = [
            "key" => env("WEATHER_API_KEY"),
            "q" => $city,
            "aqi" => "no",
            "lang" =>"sr",
            "days" => 5
        ];

        $response = Http::get($url, $params);

        $jsonResponse = $response->json();

        if (isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
        }

        if ($dbCity->todaysForecast !== null)
        {
            $this->output->comment("Command finished");
            return;
        }

        $forecast = $jsonResponse["forecast"]["forecastday"][0];

        $forecastDate = $forecast["date"];
        $forecastTemperature = $forecast["day"]["avgtemp_c"];
        $forecastWeatherType = $forecast["day"]["condition"]["text"];
        $probability = $forecast["day"]["daily_chance_of_rain"];

        $forecast = [
            "city_id" => $dbCity->id,
            "temperature" => $forecastTemperature,
            "forecast_date" => $forecastDate,
            "weather_type" => strtolower($forecastWeatherType),
            "probability" => $probability,
            ];

        ForecastsModel::create($forecast);
        $this->output->comment("Add new forecast");
    }
}
