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
        $movieId = DB::table('movies')->pluck('id');
        $roomId = DB::table('rooms')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('projections')->insert([
                '3D' => rand(0, 1),
                'date' => $faker->dateTimeBetween('now', '+1 week'),
                'movie_id' => $faker->randomElement($movieId),
                'room_id' => $faker->randomElement($roomId)
            ]);
        }
    }
}
