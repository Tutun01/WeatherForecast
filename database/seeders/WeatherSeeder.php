<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\weatherModel;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cities::all();

        foreach ($cities as $city  )
        {

            $user = WeatherModel::where(['city_id' =>$city->id])->first();
            if ($user != null)
            {
                $this->command->getOutput()->error('The city already exists');
                continue;
            }

            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => rand (15,30)

            ]);
            $this->command->getOutput()->info("You have successfully entered a new city $city");
        }

    }
}
