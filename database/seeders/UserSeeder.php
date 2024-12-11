<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = $this->command->getOutput()->ask('How many users do you want to create?',500);

        $username =  $this->command->getOutput()->ask('Enter your username');
        if ($username == 0)
        {
            $this->command->getOutput()->error('Enter your username');
            return;
        }

        $email = $this->command->getOutput()->ask('Enter your email');
        if ($email == 0)
        {
            $this->command->getOutput()->error('Enter your email');
            return;
        }

        $user = User::where(['email' => $email])->first();
        if($user instanceof User)
        {
            $this->command->getOutput()->error('User exist');
            return;
        }

        $pass = $this->command->getOutput()->ask('What code should it be?',"123456");


        $this->command->getOutput()->progressStart($amount);

        for($i = 0; $i < $amount; $i++)
        {
            User::create([
                'name' => $username,
                'email' =>$email,
                'password' => Hash::make($pass)
            ]);

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
