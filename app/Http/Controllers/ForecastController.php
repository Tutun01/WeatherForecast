<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

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

        return view("search_results", compact("cities"));

    }
}
