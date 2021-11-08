<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->lastName,
                'year' => rand(1995, 2021),
                'duration' => rand(60, 210),
            ]);
        }
    }
}
