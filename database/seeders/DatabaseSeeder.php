<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call([
            UserSeederJSON::class,
            UserSeederUpdateRole::class,
            CategorySeederJSON::class, // seeding categories
            PostSeederJSON::class, // seeding posts
            PostsVisitedSeeder::class, // seeding post views
            CategoryPostSeeder::class,
            CommentsSeederJSON::class
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
