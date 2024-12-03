<?php

namespace Database\Seeders;

use App\Models\weatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city= $this->command->getOutput()->ask('Enter the name of the city');
        if ($city == null)
        {
            $this->command->getOutput()->error('You have not entered a city name');
        }
        $temperature= $this->command->getOutput()->ask('Enter the temperature');
        if ($temperature == null)
        {
            $this->command->getOutput()->error('You have not entered a temperature');
        }
        weatherModel::create([
                'city' => $city,
                'temperatures' => $temperature,
            ]);
        $this->command->getOutput()->info("You have successfully entered a new city $city with temperature $temperature degrees");
    }
}