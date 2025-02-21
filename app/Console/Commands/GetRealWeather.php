<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life weather with our application using the Open API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //method: Swagger Tool
        $url = "https://api.weatherapi.com/v1/current.json?q=Beograd&lang=sr&key=c160bc867a394b1da24135226252102";
        $response = Http::get($url);

        $response->json();
        dd($response);

    }
}
