<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{

	public function run(){

		\DB::table('users')->insert(array(

				'name'	=>	'Jaime',
				'email'	=>	'james@laravel.es',
				'password'	=>	\Hash::make('secret')
			));
	}
}