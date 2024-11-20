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
use Log;
use Storage;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cache_key = sha1(env("APP_NAME").__METHOD__);

        // Check cache... no need to hit the Source API more than once.
        $data = Cache::get($cache_key, function() use ($cache_key) {
  
                // Let's go ahead and scrape the list of pets directly from the open GraphQL endpoint...
                $response = Http::retry(3, 3000)
                                    ->post(env("SOURCE_API_URL"), [ "query" => "query { getBreeds { breeds } }"])
                                    ->onError(function() {
                                            Log::error("Scrape of pet breed information unsuccessful. Going to Plan B...");
                                    });

                // where this is a demo, if the API is not available, we have a snapshot of the JSON locally..
                $data = ($response->successful())
                            ? $response->body()
                            : Storage::get("seeder/get_breeds.json");

                Cache::put($cache_key, $data, now()->addHours(1));
                return $data;
        });

        // // defaults "Can't find it" seems a bit unnecessary, so will present it this way and make my case,
        // // otherwise will (would) code to spec.

        foreach (["D", "C"] as $type) {
            DB::table('pet_breeds')->upsert(['type' => $type, 'name' => "I don’t know" ], ["type", "name"], ['type']);
            DB::table('pet_breeds')->upsert(['type' => $type, 'name' => "It's a mix" ], ["type", "name"], ['type']);
        }

        $breeds = json_decode($data)->data->getBreeds->breeds ?? [];
        Log::info(__METHOD__.": importing ".count($breeds)."...");

        foreach ($breeds as $breed ) {
                   list($type, $name) = explode("|", $breed);
                   DB::table('pet_breeds')->upsert([ 'type' => $type, 'name' => $name ], ["type", "name"], ['name']);
        }

        Log::info(__METHOD__ . ": success!");

    }
}
