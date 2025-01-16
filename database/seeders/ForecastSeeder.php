<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\ForecastsModel;
use Carbon\Carbon;
// use Faker\Factory;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Factory::create();

        $cities = Cities::all();

       foreach ($cities as $city)
       {
           for ($i=0; $i < 5; $i++){
               $weatherType = ForecastsModel::WEATHERS[rand(0,3)];
               $probability = null;

               if($weatherType == "rainy" || $weatherType == "snowy" || $weatherType == "cloudy")
              {
                  $probability = rand(1,100);
               }

               if ($weatherType == ForecastsModel::WEATHERS[3])
               {
                   $temperature = rand(-35,15);
               }
               else if ($weatherType == ForecastsModel::WEATHERS[0])
               {
                   $temperature = rand(-10, 40);
               }
               else if ($weatherType == ForecastsModel::WEATHERS[2])
               {
                   $temperature = rand (-35,1);
               }
               else
               {
                   $temperature = rand (-35, 40);
               }


           ForecastsModel::create([
            'city_id' => $city->id,
             'temperature' => $temperature,
             'forecast_date' => Carbon::now()->addDays(rand(1,30)),
               'weather_type' => $weatherType,
               'probability' => $probability
          ]);
           }
       }

    }
}
