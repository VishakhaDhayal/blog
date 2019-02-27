<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = App\User::create([
        	'name'  => 'Vishakha',
        	'email' => 'vishakha@gmail.com',
        	'password' => bcrypt('password'),
        	'name' => 'Vishakha',
        	'admin' => 1

        	]);

    	$user = App\Profile::create([
        	'user_id'  => $user->id,
        	'about' => 'About text',
        	'facebook' => 'facebook.com',
        	'youtube' => 'youtube.com',
        	'avatar' => 'uploads/avatar/java.png'

        	]);
    }
}
