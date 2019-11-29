<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
   
    public function run()
    {
       $user=\App\User::create([
		   'name'=>'super',
		   'email'=>'super_admin@app.com',
		   'password'=>bcrypt('12345678'),
	   ]);
		$user->attachRole('super_admin');
    }
}
