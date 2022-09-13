<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

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
        $this->call([
            CategorySeeder::class,
            CountrySeeder::class,
            SourceSeeder::class,
            // NewsSeeder::class,
            UserSeeder::class,
        ]);

        News::factory(300)->create();
    }
}
