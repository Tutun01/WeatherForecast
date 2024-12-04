<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    public function index($city)
    {

        $forecast= [
            "beograd" => [22, 24, 25, 20, 18],
            "sarajevo" => [20, 24, 22, 22, 25]
        ];

        // beograd -> BEOGRAD -> bEOGRAD
        $city = strtolower($city);
        if(!array_key_exists($city, $forecast))
        {
            die("City not exists");
        }

        dd($forecast[$city]);


    }
}
