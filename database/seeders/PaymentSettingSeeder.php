<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_settings = array(
            array('id' => '1','key' => 'paypal_status','value' => 'active','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 07:07:18'),
            array('id' => '2','key' => 'paypal_mode','value' => 'sandbox','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 07:07:18'),
            array('id' => '3','key' => 'paypal_country','value' => 'IR','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 10:34:01'),
            array('id' => '4','key' => 'paypal_currency','value' => 'IRR','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 10:34:01'),
            array('id' => '5','key' => 'paypal_currency_rate','value' => '1','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 10:34:08'),
            array('id' => '6','key' => 'paypal_client_id','value' => 'nbfgnfgnfgnfg','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 10:34:01'),
            array('id' => '7','key' => 'paypal_secret_key','value' => '123456','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 07:07:18'),
            array('id' => '8','key' => 'paypal_app_key','value' => '256256','created_at' => '2024-03-26 07:07:18','updated_at' => '2024-03-26 10:34:01'),
            array('id' => '9','key' => 'aqayepardakht_status','value' => 'active','created_at' => '2024-03-29 12:21:48','updated_at' => '2024-03-29 12:22:03'),
            array('id' => '10','key' => 'aqayepardakht_pin','value' => 'sandbox','created_at' => '2024-03-29 12:21:48','updated_at' => '2024-03-29 12:22:03')
        );

        \DB::table('payment_settings')->insert($payment_settings);
    }
}
