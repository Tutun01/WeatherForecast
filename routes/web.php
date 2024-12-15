<?php

use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', [WeatherController::class, 'index'])->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/forecast', [WeatherController::class, 'index']);


Route::view("/admin/weather", "admin.weather_index");
Route::post("/admin/weather/update", [AdminWeatherController::class, 'update'])
    ->name("weather.update");

Route::view("/admin/forecasts", "admin.forecast");
Route::post("/admin/forecasts/save",[AdminWeatherController::class, 'index'])
    ->name("forecast.save");





Route::get("/forecast/{city:name}", [TemperatureController::class, 'index']);

require __DIR__.'/auth.php';
