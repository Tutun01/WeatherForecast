<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\ForecastsModel;
use App\Services\WeatherServices;
use Illuminate\Support\Facades\Http;

class TemperatureController extends Controller
{
    public function index(Cities $city)
    {
        $weatherService = new WeatherServices();

        $jsonResponse = $weatherService->getSunsetAndSunrise($city->name);
        $sunrise = $jsonResponse['astronomy']['astro']['sunrise'];
        $sunset =  $jsonResponse['astronomy']['astro']['sunset'];

        $forecasts = ForecastsModel::with('city')->where(['city_id' => $city->id])->get();

        return view('forecasts', compact('forecasts', 'sunrise', 'sunset'));


    }
}
