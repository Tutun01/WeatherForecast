<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\ForecastsModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class AdminWeatherController extends Controller
{
    public function update(Request $request)
    {
       $request->validate([
          "temperature" => "required",
          "city_id" => "required|exists:cities,id"
       ]);

       $weather = WeatherModel::where(['city_id' => $request->get('city_id') ])->first();
       $weather->temperature = $request->get("temperature");
       $weather->save();

       return redirect()->back();
    }
    public function index(Request $request)
    {
        $request->validate([
            "city_id" => "required|exists:cities,id",
            "temperature" => "required",
            "weather_type" => "required",
            "forecast_date" => "required"
        ]);

        ForecastsModel::create($request->all());

        return redirect()->back();
    }
}


