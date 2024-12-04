<?php

namespace Database\Seeders;

use App\Models\weatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forecast = [
            "Beograd" => 22,
            "Novi Sad" => 23,
            "Sarajevo" => 24,
            "Zagreb" => 26
        ];

        foreach ($forecast as $city => $temperature )
        {

            $user = weatherModel::where(['city' =>$city])->first();
            if ($user != null)
            {
                $this->command->getOutput()->error('The city already exists');
                continue;
            }

            weatherModel::create([
                'city' => $city,

            ]);
            $this->command->getOutput()->info("You have successfully entered a new city $city");
        }
    }
}
