<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\ForecastsModel;

class TemperatureController extends Controller
{
    public function index(Cities $city)
    {

        $forecasts = ForecastsModel::where(['city_id' => $city->id])->get();

        return view('forecasts', compact('forecasts'));


    }
}
