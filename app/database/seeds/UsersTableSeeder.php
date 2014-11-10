<?php

class UsersTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->firstname = 'Riasat';
		$user->lastname = 'Raihan';
		$user->email = 'riasatraihan@gmail.com';
		$user->password = Hash::make('riasat97');
		$user->telephone = '01672702437';
		$user->admin = 1;
		$user->save();
	}
}