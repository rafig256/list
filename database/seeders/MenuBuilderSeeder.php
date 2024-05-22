<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuBuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_menus = array(
            array('id' => '1','name' => 'Home','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Footer Menu One','created_at' => '2024-05-14 19:19:25','updated_at' => '2024-05-14 19:19:25'),
            array('id' => '3','name' => 'Footer Menu Two','created_at' => '2024-05-15 15:19:44','updated_at' => '2024-05-15 15:19:44'),
            array('id' => '4','name' => 'Footer Menu Three','created_at' => '2024-05-15 15:20:50','updated_at' => '2024-05-15 15:20:50')
        );

        $admin_menu_items = array(
            array('id' => '1','label' => 'home','link' => '/','parent_id' => '0','sort' => '0','class' => NULL,'menu_id' => '1','depth' => '0','created_at' => '2024-05-14 17:16:22','updated_at' => '2024-05-14 18:28:16'),
            array('id' => '2','label' => 'about us','link' => '/about','parent_id' => '6','sort' => '5','class' => NULL,'menu_id' => '1','depth' => '1','created_at' => '2024-05-14 17:16:40','updated_at' => '2024-05-15 14:48:43'),
            array('id' => '3','label' => 'contact','link' => '/contact','parent_id' => '6','sort' => '4','class' => NULL,'menu_id' => '1','depth' => '1','created_at' => '2024-05-14 17:16:52','updated_at' => '2024-05-15 14:48:43'),
            array('id' => '5','label' => 'listing','link' => '/listing','parent_id' => '0','sort' => '1','class' => NULL,'menu_id' => '1','depth' => '0','created_at' => '2024-05-14 17:19:12','updated_at' => '2024-05-15 14:48:30'),
            array('id' => '6','label' => 'pages','link' => '#','parent_id' => '0','sort' => '3','class' => NULL,'menu_id' => '1','depth' => '0','created_at' => '2024-05-14 18:27:43','updated_at' => '2024-05-15 14:48:43'),
            array('id' => '7','label' => 'Login','link' => '/login','parent_id' => '0','sort' => '0','class' => NULL,'menu_id' => '2','depth' => '0','created_at' => '2024-05-14 19:19:38','updated_at' => '2024-05-14 19:19:50'),
            array('id' => '8','label' => 'register','link' => '/register','parent_id' => '0','sort' => '1','class' => NULL,'menu_id' => '2','depth' => '0','created_at' => '2024-05-14 19:19:49','updated_at' => '2024-05-14 19:20:30'),
            array('id' => '9','label' => 'forgot password','link' => '/forgot-password','parent_id' => '0','sort' => '2','class' => NULL,'menu_id' => '2','depth' => '0','created_at' => '2024-05-14 19:20:29','updated_at' => '2024-05-14 19:20:35'),
            array('id' => '10','label' => 'Blog','link' => '/blog','parent_id' => '0','sort' => '2','class' => NULL,'menu_id' => '1','depth' => '0','created_at' => '2024-05-15 14:48:19','updated_at' => '2024-05-15 14:48:43'),
            array('id' => '11','label' => 'Rafig M Khiyavi','link' => 'https://rafig256.ir','parent_id' => '0','sort' => '1','class' => NULL,'menu_id' => '3','depth' => '0','created_at' => '2024-05-15 15:20:08','updated_at' => '2024-05-15 15:20:08'),
            array('id' => '12','label' => 'Blog','link' => '/blog','parent_id' => '0','sort' => '0','class' => NULL,'menu_id' => '4','depth' => '0','created_at' => '2024-05-15 15:21:03','updated_at' => '2024-05-15 15:21:18'),
            array('id' => '13','label' => 'contact','link' => '/contact','parent_id' => '0','sort' => '1','class' => NULL,'menu_id' => '4','depth' => '0','created_at' => '2024-05-15 15:21:17','updated_at' => '2024-05-15 15:21:24'),
            array('id' => '14','label' => 'About Us','link' => '/about','parent_id' => '0','sort' => '2','class' => NULL,'menu_id' => '4','depth' => '0','created_at' => '2024-05-15 15:21:23','updated_at' => '2024-05-15 15:21:29')
        );

        \DB::table('admin_menus')->insert($admin_menus);
        \DB::table('admin_menu_items')->insert($admin_menu_items);
    }
}
