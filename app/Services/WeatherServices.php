<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherServices
{
    public function getForecast($city)
    {
        $url = env("WEATHER_API_URL")."v1/forecast.json";

        $params = [
            "key" => env("WEATHER_API_KEY"),
            "q" => $city,
            "aqi" => "no",
            "lang" =>"sr",
            "days" => 1
        ];

        $response = Http::get($url, $params);

        return $response->json();
    }

    public function getSunsetAndSunrise($city)
    {
        $response = Http::get(env("WEATHER_API_URL")."v1/astronomy.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $city,
            'aqi' => "no",
        ]);

        return $response->json();
    }
}
