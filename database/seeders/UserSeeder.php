<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() : void
    {

        // create a user
        User::factory()->create([
            'name' => env("USER_SEED_NAME", 'Doug Walker'),
            'email' => env("USER_SEED_EMAIL", 'doug.walker@example.com'),
            'password' => Hash::make(env("USER_SEED_PASSWORD", 'hireme123!'))
        ]);


 

    }
}
