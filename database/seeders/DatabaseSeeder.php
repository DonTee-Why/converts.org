<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

        $worship = $faker->randomElement(['yes', 'no', 'maybe']);

        $marital_status = $faker->randomElement(['single', 'married', 'divorced']);

    	foreach (range(1,200) as $index) {
            DB::table('converts')->insert([
                'name' => $faker->name($gender = 'male'|'female'),
                'known_name' => $faker->firstName($gender = 'male'|'female'),
                'phone_no' => $faker->e164PhoneNumber,
                'sex' => $faker->name($gender),
                'marital_status' => $faker->name($marital_status),
                'age' => $faker->numberBetween($min = 1, $max = 120),
                'residential_address' => $faker->address,
                'nearest_bustop' => $faker->streetName,
                'email' => $faker->safeEmail,
                'office_address' => $faker->address,
                'prayer_request' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'want_to_worship' => $faker->name($worship),
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'follow_up_status' => $faker->boolean($chanceOfGettingTrue = 50),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
// regexify('[A-Z0-9._+-]+@[A-Z0-9.-]+\.com'),