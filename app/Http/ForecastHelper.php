<?php

namespace App\Http;

class ForecastHelper
{

    const WEATHER_ICONS = [
        "rainy" => "fa-cloud-rain",
        "snowy" => "fa-snowflake",
        "sunny" => "fa-sun"
    ];
    public static function getIconByWeatherType($type)
    {
       $icon = self::WEATHER_ICONS[$type];
        return $icon;
    }
    public static function getColorByTemperature($temperature)
    {

        if ($temperature <= 0)
        {
            $color= "lightnlue";
        }
        else if ($temperature >= 1 && $temperature <= 15)
        {
            $color="blue";
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
