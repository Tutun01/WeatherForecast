<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastsModel extends Model
{
    protected $table = "forecasts";

    protected $fillable = [
        'city_id', 'temperature', 'forecast_date'
    ];

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }
}
