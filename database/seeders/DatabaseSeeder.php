<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            "first_name"=> fake()->name(),
            "last_name"=> fake()->name(),
            "email"=> fake()->safeEmail(),
            "password"=> Hash::make(Str::random(10)),
            "remember_token"=> Str::random(10),
            ]);
    }
}
