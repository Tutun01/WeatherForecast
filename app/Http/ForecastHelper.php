<?php

namespace App\Http;

class ForecastHelper
{

    const WEATHER_ICONS = [
        "rainy" => "fa-cloud-rain",
        "snowy" => "fa-snowflake",
        "sunny" => "fa-sun",
        "cloudy" => "fa-cloud"
    ];
    public static function getIconByWeatherType($type)
    {
       return match($type) {
           "rainy" => "fa-cloud-rain",
           "snowy" => "fa-snowflake",
           "sunny" => "fa-sun",
           "cloudy" => "fa-cloud",
           default => "fa-sun",
       };

    }
    public static function getColorByTemperature($temperature)
    {

        if ($temperature <= 0)
        {
            $color= "orange";
        }
        else if ($temperature >= 1 && $temperature <= 9)
        {
            $color="purple";
        }
        else if ($temperature >= 10 && $temperature < 15 )
        {
            $color = "blue";
        }
        else if ($temperature > 15 && $temperature < 25)
        {
            $color="green";
        }
        else
        {
            $color="red";
        }

        return $color;
    }
}
