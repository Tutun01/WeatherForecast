<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\ForecastsModel;
use Illuminate\Support\Facades\Http;

class TemperatureController extends Controller
{
    public function index(Cities $city)
    {

        $response = Http::get(env("WEATHER_API_URL")."v1/astronomy.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $city->name,
            'aqi' => "no",
        ]);

        $jsonResponse = $response->json();
        $sunrise = $jsonResponse['astronomy']['astro']['sunrise'];
        $sunset =  $jsonResponse['astronomy']['astro']['sunset'];

        $forecasts = ForecastsModel::with('city')->where(['city_id' => $city->id])->get();

        return view('forecasts', compact('forecasts', 'sunrise', 'sunset'));


    }
}
