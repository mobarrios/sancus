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

		$this->call('ProfileTableSeeder');
		$this->call('MedicalinsuranceTableSeeder');
		$this->call('MedicalinsuranceplanTableSeeder');
		$this->call('ClientTableSeeder');
		$this->call('DoctorTableSeeder');
		$this->call('MeasurementunitTableSeeder');
		$this->call('ModuleTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('PermissionTableSeeder');
		$this->call('ProviderTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('ItemTableSeeder');
	}

}
