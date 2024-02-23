<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'=>'Rafig Khiyavi',
                'email'=>'rafig_256@yahoo.com',
                'password'=>bcrypt('256256'),
                'user_type'=>'admin',
            ],
            [
                'name'=>'user',
                'email'=>'test@gmail.com',
                'password'=>bcrypt('256256'),
                'user_type'=>'user',
            ]
        ]);
    }
}
