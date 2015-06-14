<?php

class DoctorTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Doctor::create(array(
			'name' 					=> 'Gonzalo',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'national_license'		=> '6666666',
			'provincial_license'	=> '7777777',
		));
		
		Doctor::create(array(
			'name' 					=> 'Martin',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'national_license'		=> '3333333',
			'provincial_license'	=> '8888888',
		));
		
		Doctor::create(array(
			'name' 					=> 'Julio',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'national_license'		=> '2222222',
			'provincial_license'	=> '9999999',
		));
	}
}