<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    protected $table = "weather";

    protected $fillable = [
        "city_id", "temperatures"
    ];

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }

}
