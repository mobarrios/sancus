<?php

class ClientTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Client::create(array(
			'name' 					=> 'Manuel',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'company_name'			=> 'company name',
			'cuit' 					=> '4444444',
			'medicalinsurance_id'	=> '1',
			'medicalinsuranceplan_id'	=> '1',
		));

		Client::create(array(
			'name' 					=> 'Fernando',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'company_name'			=> 'company name',
			'cuit' 					=> '4444444',
			'medicalinsurance_id'	=> '1',
			'medicalinsuranceplan_id'	=> '2',
		));

		Client::create(array(
			'name' 					=> 'Alejandro',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'company_name'			=> 'company name',
			'cuit' 					=> '4444444',
			'medicalinsurance_id'	=> '1',
			'medicalinsuranceplan_id'	=> '3',
		));

		Client::create(array(
			'name' 					=> 'Noelia',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'company_name'			=> 'company name',
			'cuit' 					=> '4444444',
			'medicalinsurance_id'	=> '2',
			'medicalinsuranceplan_id'	=> '4',
		));

		Client::create(array(
			'name' 					=> 'Candela',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'company_name'			=> 'company name',
			'cuit' 					=> '4444444',
			'medicalinsurance_id'	=> '2',
			'medicalinsuranceplan_id'	=> '5',
		));

		Client::create(array(
			'name' 					=> 'Paula',
			'last_name'				=> 'Barrios',
			'dni'					=> '2222222',
			'address'				=> 'Saint Martin Boulevard 1234',
			'email'					=> 'manuel@navcoder.com',
			'phone'					=> '1234567',
			'cell_phone'			=> '7654321',
			'company_name'			=> 'company name',
			'cuit' 					=> '4444444',
			'medicalinsurance_id'	=> '2',
			'medicalinsuranceplan_id'	=> '6',
		));
	}
}