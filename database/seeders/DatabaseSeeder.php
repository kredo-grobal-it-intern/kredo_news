<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\News;
use App\Models\Reaction;
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
            NewsSeeder::class,
            UserSeeder::class,
            BookmarkSeeder::class,
            ReactionSeeder::class,
            CommentSeeder::class,
            FollowSeeder::class,
        ]);

        // News::factory(300)->create();  // Deactivated because this factory doesn't work in heroku. If you need it on local, please activate it and deactivate NewsSeeder.
        // Bookmark::factory(300)->create();
        // Reaction::factory(300)->create();
    

        // News::factory(300)->create();  // Deactivated because this factory doesn't work in heroku. If you need it on local, please activate it and deactivate NewsSeeder.
        // Comment::factory(10000)->create(); // Deactivated because this factory doesn't work in heroku. If you need it on local, please activate it and deactivate NewsSeeder.
    }
}
