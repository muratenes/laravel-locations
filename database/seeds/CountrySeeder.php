<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i < 30; $i++) {
            \MuratEnes\Regions\Models\Country::insert([
                'name' => $faker->country,
                'code' => $faker->countryCode,
            ]);
        }
    }
}
