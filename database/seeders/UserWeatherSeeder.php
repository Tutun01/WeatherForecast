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
        $city= $this->command->getOutput()->ask('Unesite ime grada');
        if ($city == null)
        {
            $this->command->getOutput()->error('Niste uneli ime grad');
        }
        $temperature= $this->command->getOutput()->ask('temperaturu');
        if ($temperature == null)
        {
            $this->command->getOutput()->error('Niste temperaturu');
        }
        weatherModel::create([
                'city' => $city,
                'temperatures' => $temperature,
            ]);
        $this->command->getOutput()->info("Uspesno ste uneli novi grad $city sa temperaturom $temperature stepeni");
    }
}
