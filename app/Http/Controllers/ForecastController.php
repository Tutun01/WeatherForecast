<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get("city");

        $cities = Cities::with('todaysForecast')-> where("name", "LIKE", "%$cityName%")->get();

        if (count($cities) == 0 )
        {
            return redirect()->back()
                ->with("error", "We did not find cities that meet your criteria");
        }

        $userFavourites = [];
        if (Auth::check())
        {
            $userFavourites = Auth::user()->cityFavourites;
            $userFavourites = $userFavourites->pluck('city_id')->toArray();
        }


        return view("search_results", compact("cities", "userFavourites"));

    }
}
