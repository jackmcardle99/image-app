<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostSeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        $json = File::get('database/data/posts.json');
        $post = json_decode($json);

        foreach ($post as $key => $value) {
            Post::create([
                "user_id"=>$value->user_id,
                "title"=>$value->title,
                "summary"=>$value->summary,
                "image_filename"=>$value->image_filename,
                "is_published"=>$value->is_published,
                "value"=>$value->value,
                "created_at"=>$value->created_at,
                "updated_at"=>$value->updated_at
            ]);

            // add the image to the Storage - original and thumbnail
            $image = Image::make('database/data/images/'.$value->image_filename);
            $originalFileName = $value->image_filename;
            $destinationPath = storage_path('app/public/uploads/');
            /**
             * Load Image to Storage Folder
             */
            $image->save($destinationPath.$originalFileName);
            /**
             * Generate Thumbnail Image to thumbnail Storage Folder
             */
            $destinationPathThumbnail = storage_path('app/public/uploads/thumbnails/');
            $image->resize(1000, 750, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($destinationPathThumbnail.$originalFileName);

        }


    }
}
