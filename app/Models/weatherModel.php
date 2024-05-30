<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weatherModel extends Model
{
    protected $table = "weather_models";

    protected $fillable = [
        "city", "temperatures"
    ];
}
