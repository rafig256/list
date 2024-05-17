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
                'phone'=>'09357846225',
                'address'=>'iran',
                'website'=>'https://rafig.ir',
                'avatar'=>'/default/avatar.png',
                'banner'=>'/default/breadcroumb_bg.jpg'
            ],
            [
                'name'=>'user',
                'email'=>'test@gmail.com',
                'password'=>bcrypt('256256'),
                'user_type'=>'user',
                'phone'=>'09991112222',
                'address'=>'iran',
                'website'=>'https://rafig256.ir',
                'avatar'=>'/default/avatar.png',
                'banner'=>'/default/breadcroumb_bg.jpg'
            ]
        ]);

        $user = User::where('name' , 'Rafig Khiyavi')->first();
        $user->assignRole('Super Admin');
    }
}
