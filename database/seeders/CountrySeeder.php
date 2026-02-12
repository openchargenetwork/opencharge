<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/countries.json');
        
        if (!File::exists($jsonPath)) {
            $this->command->error("Country data file not found at: {$jsonPath}");
            return;
        }

        $countries = json_decode(File::get($jsonPath), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error("Error decoding JSON: " . json_last_error_msg());
            return;
        }

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['code' => $country['code']],
                [
                    'code' => $country['code'],
                    'name' => $country['name'],
                ]
            );
        }

        $this->command->info('Countries seeded successfully!');
    }
}