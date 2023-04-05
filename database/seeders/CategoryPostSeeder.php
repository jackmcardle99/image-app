<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('category_post')->insert([
            ['category_id'=>1, 'post_id'=>1],
            ['category_id'=>3, 'post_id'=>1],
            ['category_id'=>1, 'post_id'=>2],
            ['category_id'=>3, 'post_id'=>2],
            ['category_id'=>2, 'post_id'=>3],
            ['category_id'=>3, 'post_id'=>3],
            ['category_id'=>1, 'post_id'=>4],
            ['category_id'=>4, 'post_id'=>4],
            ['category_id'=>4, 'post_id'=>5],
            ['category_id'=>2, 'post_id'=>5],
            ['category_id'=>2, 'post_id'=>6],
            ['category_id'=>3, 'post_id'=>6],
            ['category_id'=>1, 'post_id'=>7],
            ['category_id'=>3, 'post_id'=>7],
            ['category_id'=>1, 'post_id'=>8],
            ['category_id'=>3, 'post_id'=>8]
        ]);

    }
}
