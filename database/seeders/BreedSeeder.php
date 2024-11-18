<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Breed;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cache_key = sha1(env("APP_NAME").__METHOD__);

        // Check cache... no need to hit the API more than once.
        Cache::get($cache_key, function() use ($cache_key) {
  
                // Let's go ahead and scrape the list of pets directly from the open GraphQL endpoint...
                $response = Http::retry(3, 3000)
                                    ->post(env("REMOTE_API_URL"), [ "query" => "query { getBreeds { breeds } }"])
                                    ->onError(function() {
                                            // Simple failure apparent in Artisan CLI
                                            die("Scrape of pet breed information unsuccessful!");
                                    });
 
                $json_data = $response->body();


                Cache::put($cache_key, $json_data, now()->addHours(1));
                return $json_data;
        });


 

    }
}
