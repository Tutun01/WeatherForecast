<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\ForecastsModel;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $cities = Cities::all();

       foreach ($cities as $city)
       {
           for ($i=0; $i < 5; $i++){
           ForecastsModel::create([
            'city_id' => $city->id,
             'temperature' =>$faker->numberBetween(-5, 40),
             'forecast_date' => Carbon::now()
          ]);
           }
       }

    }
}
