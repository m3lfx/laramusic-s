<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $song = new Song();
            $song->title = $faker->words(3, true);
            $song->description = $faker->paragraph();
            $song->album_id = $faker->numberBetween(1, 20);
            $song->save();

        }
    }
}
