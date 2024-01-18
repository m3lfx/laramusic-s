<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ArtistSeeder;
use Database\Seeders\AlbumSeeder;
use Database\Seeders\SongSeeder;

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
        $this->call(ArtistSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(SongSeeder::class);

    }
}
