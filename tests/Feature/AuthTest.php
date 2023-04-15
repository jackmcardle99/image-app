<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Clue\StreamFilter\fun;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
//    public function unauthenticated_user_cannot_access_posts():void{
//
//        $response = $this->get('posts');
//        $response->assertRedirect('posts');
//
//    }
//    public function test_login_user_redirects_to_notes(): void
//    {
//        User::create([
//            'name' => 'User',
//            'email' => 'user@user.com',
//            'password'=>bcrypt('password123')
//        ]);
//
//        $response = $this->post('login',[
//            'email' => 'user@user.com',
//            'password' => 'password123'
//        ]);
//
//
//
//        $response->assertStatus(302);
//        $response->assertRedirect('posts');
//    }
//
//    public function test_paginated_posts_table_shows_last_item(){
//
//        $user = User::factory()->create([
//            'id' => 2
//        ]);
//
//        $posts = Post::factory(11)->create([
//            'user_id' => 2,
//            'summary'=> 'Testing via PHP unit'
//        ]);
//
//        $lastPost = $posts->last();
//        $response = $this->actingAs($user)->get('posts');
//
//        $response->assertStatus(200);
//        $response->assertViewHas('posts',function ($collection) use($lastPost){
//           return !$collection->contains($lastPost);
//        });
//    }
//
//    public function test_user_table_has_three_users(){
//        User::factory()->count(3)->create();
//        $this->assertDatabaseCount('users',3);
//    }

    public function test_admin_has_been_found(){

        User::factory()->count(2)->create();
        User::factory()->create([
           'name'=>'admin',
            'email'=>'admin@image-app.com',
            'password'=>bcrypt('admin')
        ]);

        $this->assertDatabaseHas('users',[
            'email'=>'admin@image-app.com',
        ]);
    }
}
