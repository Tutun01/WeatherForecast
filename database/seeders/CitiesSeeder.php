<?php

namespace Database\Seeders;

use App\Models\Cities;
use Composer\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->getOutput()->ask('How many cities do you want to create?',100);

        $faker= \Faker\Factory::create();


        $this->command->getOutput()->progressStart(100);

        for($i = 0; $i < 100; $i++)
        {
            Cities::create([
                'name' => $faker->city,

            ]);

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
