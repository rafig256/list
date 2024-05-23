<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = array(
            array('id' => '2','name' => 'hero update','guard_name' => 'web','group_name' => 'hero','created_at' => '2024-05-16 17:35:21','updated_at' => '2024-05-16 17:35:21'),
            array('id' => '3','name' => 'about page update','guard_name' => 'web','group_name' => 'about page','created_at' => '2024-05-16 17:35:46','updated_at' => '2024-05-16 17:35:46'),
            array('id' => '4','name' => 'contact page update','guard_name' => 'web','group_name' => 'about page','created_at' => '2024-05-16 17:36:01','updated_at' => '2024-05-16 17:36:01'),
            array('id' => '5','name' => 'testimonial create','guard_name' => 'web','group_name' => 'testimonial','created_at' => '2024-05-16 17:36:26','updated_at' => '2024-05-16 17:36:26'),
            array('id' => '6','name' => 'testimonial update','guard_name' => 'web','group_name' => 'testimonial','created_at' => '2024-05-16 17:36:35','updated_at' => '2024-05-16 17:36:35'),
            array('id' => '7','name' => 'testimonial index','guard_name' => 'web','group_name' => 'testimonial','created_at' => '2024-05-16 17:36:49','updated_at' => '2024-05-16 17:36:49'),
            array('id' => '8','name' => 'testimonial delete','guard_name' => 'web','group_name' => 'testimonial','created_at' => '2024-05-16 17:37:06','updated_at' => '2024-05-16 17:37:06'),
            array('id' => '9','name' => 'listing create','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-17 08:15:18','updated_at' => '2024-05-17 08:15:18'),
            array('id' => '10','name' => 'listing index','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-17 08:15:28','updated_at' => '2024-05-17 08:15:28'),
            array('id' => '11','name' => 'listing update','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-17 08:15:36','updated_at' => '2024-05-17 08:15:36'),
            array('id' => '12','name' => 'listing delete','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-17 08:15:43','updated_at' => '2024-05-17 08:15:43'),
            array('id' => '13','name' => 'pending listing','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-17 08:42:47','updated_at' => '2024-05-17 08:42:47'),
            array('id' => '14','name' => 'listing review','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-17 08:43:16','updated_at' => '2024-05-17 08:43:16'),
            array('id' => '15','name' => 'location create','guard_name' => 'web','group_name' => 'location','created_at' => '2024-05-17 08:51:43','updated_at' => '2024-05-17 08:51:43'),
            array('id' => '16','name' => 'location update','guard_name' => 'web','group_name' => 'location','created_at' => '2024-05-17 08:51:49','updated_at' => '2024-05-17 08:51:49'),
            array('id' => '17','name' => 'location index','guard_name' => 'web','group_name' => 'location','created_at' => '2024-05-17 08:51:54','updated_at' => '2024-05-17 08:51:54'),
            array('id' => '18','name' => 'location delete','guard_name' => 'web','group_name' => 'location','created_at' => '2024-05-17 08:52:01','updated_at' => '2024-05-17 08:52:01'),
            array('id' => '19','name' => 'amenity create','guard_name' => 'web','group_name' => 'amenity','created_at' => '2024-05-17 08:52:57','updated_at' => '2024-05-17 08:52:57'),
            array('id' => '20','name' => 'amenity update','guard_name' => 'web','group_name' => 'amenity','created_at' => '2024-05-17 08:53:02','updated_at' => '2024-05-17 08:53:02'),
            array('id' => '21','name' => 'amenity index','guard_name' => 'web','group_name' => 'amenity','created_at' => '2024-05-17 08:53:10','updated_at' => '2024-05-17 08:53:10'),
            array('id' => '22','name' => 'amenity delete','guard_name' => 'web','group_name' => 'amenity','created_at' => '2024-05-17 08:53:17','updated_at' => '2024-05-17 08:53:17'),
            array('id' => '23','name' => 'schedule index','guard_name' => 'web','group_name' => 'schedule','created_at' => '2024-05-17 08:54:25','updated_at' => '2024-05-17 08:54:25'),
            array('id' => '24','name' => 'schedule create','guard_name' => 'web','group_name' => 'schedule','created_at' => '2024-05-17 08:54:30','updated_at' => '2024-05-17 08:54:30'),
            array('id' => '25','name' => 'schedule update','guard_name' => 'web','group_name' => 'schedule','created_at' => '2024-05-17 08:54:34','updated_at' => '2024-05-17 08:54:34'),
            array('id' => '26','name' => 'schedule delete','guard_name' => 'web','group_name' => 'schedule','created_at' => '2024-05-17 08:54:39','updated_at' => '2024-05-17 08:54:39'),
            array('id' => '27','name' => 'blog index','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-17 08:55:22','updated_at' => '2024-05-17 08:55:22'),
            array('id' => '28','name' => 'blog create','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-17 08:55:28','updated_at' => '2024-05-17 08:55:28'),
            array('id' => '29','name' => 'blog update','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-17 08:55:34','updated_at' => '2024-05-17 08:55:34'),
            array('id' => '30','name' => 'blog delete','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-17 08:55:39','updated_at' => '2024-05-17 08:55:39'),
            array('id' => '31','name' => 'blog comment','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-17 08:55:52','updated_at' => '2024-05-17 08:55:52'),
            array('id' => '33','name' => 'listing category index','guard_name' => 'web','group_name' => 'listing category','created_at' => '2024-05-18 12:47:05','updated_at' => '2024-05-18 12:47:05'),
            array('id' => '34','name' => 'listing category create','guard_name' => 'web','group_name' => 'listing category','created_at' => '2024-05-18 12:47:13','updated_at' => '2024-05-18 12:47:13'),
            array('id' => '35','name' => 'listing category update','guard_name' => 'web','group_name' => 'listing category','created_at' => '2024-05-18 12:47:20','updated_at' => '2024-05-18 12:47:20'),
            array('id' => '36','name' => 'listing category delete','guard_name' => 'web','group_name' => 'listing category','created_at' => '2024-05-18 12:47:27','updated_at' => '2024-05-18 12:47:27'),
            array('id' => '37','name' => 'pending update','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-18 12:52:00','updated_at' => '2024-05-18 12:52:00'),
            array('id' => '38','name' => 'blog show','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-18 12:58:25','updated_at' => '2024-05-18 12:58:25'),
            array('id' => '39','name' => 'review category index','guard_name' => 'web','group_name' => 'review category','created_at' => '2024-05-18 13:13:06','updated_at' => '2024-05-18 13:13:06'),
            array('id' => '40','name' => 'review category create','guard_name' => 'web','group_name' => 'review category','created_at' => '2024-05-18 13:13:14','updated_at' => '2024-05-18 13:13:14'),
            array('id' => '41','name' => 'review category update','guard_name' => 'web','group_name' => 'review category','created_at' => '2024-05-18 13:13:19','updated_at' => '2024-05-18 13:13:19'),
            array('id' => '42','name' => 'review category delete','guard_name' => 'web','group_name' => 'review category','created_at' => '2024-05-18 13:13:26','updated_at' => '2024-05-18 13:13:26'),
            array('id' => '43','name' => 'report index','guard_name' => 'web','group_name' => 'report','created_at' => '2024-05-18 13:15:26','updated_at' => '2024-05-18 13:15:26'),
            array('id' => '44','name' => 'report delete','guard_name' => 'web','group_name' => 'report','created_at' => '2024-05-18 13:15:31','updated_at' => '2024-05-18 13:15:31'),
            array('id' => '45','name' => 'gallery create','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-18 13:19:38','updated_at' => '2024-05-18 13:19:38'),
            array('id' => '46','name' => 'gallery delete','guard_name' => 'web','group_name' => 'listing','created_at' => '2024-05-18 13:19:46','updated_at' => '2024-05-18 13:19:46'),
            array('id' => '47','name' => 'blog category index','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-18 13:21:58','updated_at' => '2024-05-18 13:21:58'),
            array('id' => '48','name' => 'blog category create','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-18 13:22:10','updated_at' => '2024-05-18 13:22:10'),
            array('id' => '49','name' => 'blog category update','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-18 13:22:16','updated_at' => '2024-05-18 13:22:16'),
            array('id' => '50','name' => 'blog category delete','guard_name' => 'web','group_name' => 'blog','created_at' => '2024-05-18 13:22:21','updated_at' => '2024-05-18 13:22:21'),
            array('id' => '51','name' => 'message index','guard_name' => 'web','group_name' => 'message','created_at' => '2024-05-18 13:24:12','updated_at' => '2024-05-18 13:24:12'),
            array('id' => '52','name' => 'access management index','guard_name' => 'web','group_name' => 'permission','created_at' => '2024-05-18 13:27:07','updated_at' => '2024-05-18 13:27:07'),
            array('id' => '53','name' => 'menu builder index','guard_name' => 'web','group_name' => 'menu','created_at' => '2024-05-18 13:28:52','updated_at' => '2024-05-18 13:28:52'),
            array('id' => '54','name' => 'settings','guard_name' => 'web','group_name' => 'setting','created_at' => '2024-05-18 13:31:19','updated_at' => '2024-05-18 13:31:19'),
            array('id' => '55','name' => 'user index','guard_name' => 'web','group_name' => NULL,'created_at' => '2024-05-19 15:16:34','updated_at' => '2024-05-19 15:16:34'),
            array('id' => '56','name' => 'user update','guard_name' => 'web','group_name' => NULL,'created_at' => '2024-05-19 15:16:45','updated_at' => '2024-05-19 15:16:45'),
            array('id' => '57','name' => 'user delete','guard_name' => 'web','group_name' => NULL,'created_at' => '2024-05-19 15:16:50','updated_at' => '2024-05-19 15:16:50'),
            array('id' => '58','name' => 'user create','guard_name' => 'web','group_name' => NULL,'created_at' => '2024-05-19 15:17:33','updated_at' => '2024-05-19 15:17:33')
        );

        $roles = array(
            array('id' => '7','name' => 'Super Admin','guard_name' => 'web','created_at' => '2024-05-17 20:18:01','updated_at' => '2024-05-17 20:18:01'),
            array('id' => '8','name' => 'writer','guard_name' => 'web','created_at' => '2024-05-19 11:07:02','updated_at' => '2024-05-19 11:07:02')
        );

        $role_has_permissions = array(
            array('permission_id' => '2','role_id' => '8'),
            array('permission_id' => '3','role_id' => '8'),
            array('permission_id' => '4','role_id' => '8'),
            array('permission_id' => '6','role_id' => '8'),
            array('permission_id' => '7','role_id' => '8'),
            array('permission_id' => '8','role_id' => '8'),
            array('permission_id' => '13','role_id' => '8'),
            array('permission_id' => '14','role_id' => '8'),
            array('permission_id' => '27','role_id' => '8'),
            array('permission_id' => '28','role_id' => '8'),
            array('permission_id' => '29','role_id' => '8'),
            array('permission_id' => '31','role_id' => '8'),
            array('permission_id' => '37','role_id' => '8'),
            array('permission_id' => '46','role_id' => '8'),
            array('permission_id' => '52','role_id' => '8'),
            array('permission_id' => '53','role_id' => '8'),
            array('permission_id' => '54','role_id' => '8')
        );

        $model_has_roles = array(
            array('role_id' => '7','model_type' => 'App\\Models\\User','model_id' => '7'),
            array('role_id' => '8','model_type' => 'App\\Models\\User','model_id' => '8'),
            array('role_id' => '8','model_type' => 'App\\Models\\User','model_id' => '10')
        );

        \DB::table('permissions')->insert($permissions);
        \DB::table('roles')->insert($roles);
        \DB::table('role_has_permissions')->insert($role_has_permissions);
        \DB::table('model_has_roles')->insert($model_has_roles);
    }
}
