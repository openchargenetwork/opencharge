<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'OpenCharge Network',
            'email' => 'openchargen@gmail.com',
            'password' => '*Opencharge123#',
            'email_verified_at' => now(),
        ]);
        $this->call([
            CountrySeeder::class,
        ]);
    }
}
