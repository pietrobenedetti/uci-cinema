<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Provider\DateTime as DateTime;

class ProjectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('projections')->insert([
                '3D' => rand(0, 1),
                'date' => $faker->dateTimeBetween('now', '+1 week'),
            ]);
        }
    }
}
