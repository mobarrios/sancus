<?php

class ProfileTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Profile::create(array(
			'name' 	=> Config::get('constants.ADMIN_PROFILE_NAME'),
		));

		Profile::create(array(
			'name' 	=> 'Profile 2',
		));

		Profile::create(array(
			'name' 	=> 'Profile 3',
		));
	}

}