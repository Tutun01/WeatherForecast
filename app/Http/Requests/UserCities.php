<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCities extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();
        if($user == null)
        {
            return redirect()->back()->with(['error' => "You must be logged in to add a city to your favorites"]);
        }

        \App\Models\UserCities::create([
           'city_id' => $city,
            'user_id' => $user->id
        ]);

        return redirect()->back();
    }

    public function unFavourite($city)
    {
        $user = Auth::user();
        if($user == null)
        {
            return redirect()->back()->with(['error' => "You must be logged in to add a city to your favorites"]);
        }
        $favourite = \App\Models\UserCities::where([
            "city_id" => $city,
            "user_id" => $user->id
        ])-> first();

        $favourite->delete();
        return redirect()->back();
    }

}
