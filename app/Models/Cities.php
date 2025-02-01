<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name', 'temperature'
    ];

    public function forecasts()
    {
        return $this->hasMany(ForecastsModel::class, 'city_id', 'id')
            ->orderBy("forecast_date");
    }

    public function todaysForecast()
    {
        return $this->hasOne(ForecastsModel::class, 'city_id', 'id')
            ->whereDate("forecast_date", Carbon::now());
}

}


