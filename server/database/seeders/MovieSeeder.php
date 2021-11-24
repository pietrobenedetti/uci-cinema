<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;
use Faker\Provider\Image as Image;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, Lorem $lorem, Image $image)
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->lastName,
                'img' => $image->imageUrl($width = 640, $height = 480),
                'director' => $faker->lastName,
                'director_img' => $image->imageUrl($width, $height, 'people'),
                'rated' => rand(0, 5),
                'year' => rand(1995, 2021),
                'duration' => rand(60, 210),
                'description' => $lorem->sentence($nbWords = 6, $variableNbWords = true),
                'description_long' => $lorem->text($maxNbChars = 200)
            ]);
        }
    }
}
