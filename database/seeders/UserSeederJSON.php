<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $json = File::get('database/data/users.json');
        $users = json_decode($json);

        foreach ($users as $key => $value) {
            User::create([
                "id" => $value->id,
                "name" => $value->name,
                "email" => $value->email,
                "role" => $value->role,
                "email_verified_at" => $value->email_verified_at,
                "password" => $value->password,
                "remember_token" => $value->remember_token,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at,
            ]);
        }
    }
}
