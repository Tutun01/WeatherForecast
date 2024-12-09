<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = [
       'name'
    ];

    public function forecasts()
    {
        return $this->hasMany(ForecastsModel::class, 'city_id');
    }
}
