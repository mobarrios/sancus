<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ModuleTableSeeder');
		$this->call('ProfileTableSeeder');
		$this->call('PaymentoptionTableSeeder');
		$this->call('MedicalinsuranceTableSeeder');
		$this->call('MedicalinsuranceplanTableSeeder');
		$this->call('MeasurementunitTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('ProviderTableSeeder');
		$this->call('ItemTableSeeder');
		$this->call('ClientTableSeeder');
		$this->call('DoctorTableSeeder');		
		$this->call('UserTableSeeder');
		$this->call('PermissionTableSeeder');
		
	}

}
