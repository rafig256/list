<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = array(
            array('id' => '1','key' => 'site_name','value' => 'ishtap','created_at' => '2024-03-25 10:41:08','updated_at' => '2024-03-25 10:41:08'),
            array('id' => '2','key' => 'site_email','value' => 'rafig_256@yahoo.com','created_at' => '2024-03-25 10:41:08','updated_at' => '2024-03-25 10:41:08'),
            array('id' => '3','key' => 'site_phone','value' => '09357846224','created_at' => '2024-03-25 10:41:08','updated_at' => '2024-03-25 17:12:35'),
            array('id' => '4','key' => 'site_default_currency','value' => 'HUF','created_at' => '2024-03-25 10:41:08','updated_at' => '2024-03-25 17:14:41'),
            array('id' => '5','key' => 'site_currency_icon','value' => '$','created_at' => '2024-03-25 10:41:08','updated_at' => '2024-03-25 17:22:58'),
            array('id' => '6','key' => 'site_currency_position','value' => 'right','created_at' => '2024-03-25 10:41:08','updated_at' => '2024-04-17 23:33:56'),
            array('id' => '7','key' => 'num_sub_cat_in_home','value' => '5','created_at' => '2024-03-31 11:10:34','updated_at' => '2024-03-31 11:24:06'),
            array('id' => '8','key' => 'site_timezone','value' => 'Asia/Tehran','created_at' => '2024-04-03 13:33:44','updated_at' => '2024-04-03 13:33:44'),
            array('id' => '9','key' => 'pusher_app_id','value' => '1789560','created_at' => '2024-04-17 23:32:46','updated_at' => '2024-04-17 23:32:46'),
            array('id' => '10','key' => 'pusher_key','value' => '35f24941a61b0892ff5c','created_at' => '2024-04-17 23:32:46','updated_at' => '2024-04-17 23:32:46'),
            array('id' => '11','key' => 'pusher_secret','value' => 'cfe6829c3b9faeade65a','created_at' => '2024-04-17 23:32:46','updated_at' => '2024-04-17 23:32:46'),
            array('id' => '12','key' => 'pusher_cluster','value' => 'ap2','created_at' => '2024-04-17 23:32:46','updated_at' => '2024-04-17 23:32:46'),
            array('id' => '13','key' => 'pusher_active','value' => '1','created_at' => '2024-04-17 23:32:46','updated_at' => '2024-04-17 23:34:45'),
            array('id' => '14','key' => 'logo','value' => '/uploads/media664daba594ba8.jpg','created_at' => '2024-05-22 08:04:47','updated_at' => '2024-05-22 11:54:05'),
            array('id' => '15','key' => 'favicon','value' => '/uploads/media664dae993302b.png','created_at' => '2024-05-22 08:04:47','updated_at' => '2024-05-22 12:06:41'),
            array('id' => '16','key' => 'default-color','value' => '#ff8000','created_at' => '2024-05-22 18:05:36','updated_at' => '2024-05-22 18:14:47')
        );
        \DB::table('settings')->insert($settings);
    }
}
