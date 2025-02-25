<?php

use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Requests\UserCities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $userFavourites = [];

    $user = Auth::user();
    if($user !== null)
    {
        $userFavourites = \App\Models\UserCities::where([
           'user_id' => $user->id
        ])->get();
    }


    return view( "welcome", compact('userFavourites'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/forecast', [WeatherController::class, 'index']);

/**
 * User cities
 */
Route::get("/user-cities/favourite/{city}", [UserCities::class, "favourite"])
        ->name("city.favourite");

Route::get("/user-cities/unFavourite/{city}", [UserCities::class, "unFavourite"])
    ->name("city.unfavourite");

Route::prefix("/admin")-> middleware(AdminCheckMiddleware::class)->group(function (){
    Route::view("/weather", "admin.weather_index");
    Route::post("/weather/update", [AdminWeatherController::class, 'update'])
        ->name("weather.update");

    Route::view("/forecasts", "admin.forecast");
    Route::post("/forecasts/save",[AdminWeatherController::class, 'index'])
        ->name("forecast.save");
});





Route::get("/forecast/search", [ForecastController::class, 'search'])
    ->name("forecast.search");
Route::get("/forecast/{city:name}", [TemperatureController::class, 'index'])
    ->name("forecast.permalink");


require __DIR__.'/auth.php';
