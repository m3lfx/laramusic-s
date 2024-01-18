<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $artist = new Artist();
            $artist->name = $faker->name();
            $artist->country = $faker->randomElement(array('USA', 'korea', 'Philippines', 'japan', 'taguig'));
            // $artist->country = 'USA';
            $artist->img_path = 'default.jpg';
            $artist->save();

        }
    }
}
