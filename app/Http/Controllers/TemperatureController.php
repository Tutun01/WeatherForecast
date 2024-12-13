<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\ForecastsModel;

class TemperatureController extends Controller
{
    public function index(Cities $city)
    {


        return view('forecasts', compact('city'));


    }
}
