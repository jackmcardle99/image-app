<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::create([  // creating admin
//            'name' => 'admin',
//            'email' => 'admin@image-app.com',
//            'password' => Hash::make('admin'),
//            'is_admin' => true,
//            'email_verified_at' => now(),
//        ]);
        User::create([  //creating my account
            'name' => 'Jack McArdle',
            'email' => 'jack@abc.com',
            'password' => Hash::make('qwerty1234'),
            'email_verified_at' => now(),
        ]);
        User::factory(5)->create(); //creating 5 additional users
    }
}
