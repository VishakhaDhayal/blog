<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		\App\Settings::create([
 			'site_name'=> 'My first Laravel site',
 			'contact_number'=> '987890988',
 			'contact_email'=>  'laraverl@gmail.com',
 			'contact_address'=> 'Kalka'
 		]);       
    }
}
