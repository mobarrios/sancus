<?php

class MedicalinsuranceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Medicalinsurance::create(array(
			'name' 		=> 'Obra social 1',
			'address'	=> 'Direccion de obra social 1',
			'city'		=> 'Ciudad de obra social ',
			'province'	=> 'Provincia de obra social',
			'zip_code'  => 'Codigo postal de obra social',
			'phone'		=> '1111111',
			'cell_phone'=> '5555555',
			'fax'		=> '3333333',
			'email'		=> 'obrasocial1@gmail.com',
			'cuit'		=> '123456789',
			'iva_conditions' 	=> 'exento',
			'observations'		=> 'gran obra social',
		));

		Medicalinsurance::create(array(
			'name' 		=> 'Obra social 2',
			'address'	=> 'Direccion de obra social 2',
			'city'		=> 'Ciudad de obra social ',
			'province'	=> 'Provincia de obra social',
			'zip_code'  => 'Codigo postal de obra social',
			'phone'		=> '1111111',
			'cell_phone'=> '5555555',
			'fax'		=> '3333333',
			'email'		=> 'obrasocial1@gmail.com',
			'cuit'		=> '123456789',
			'iva_conditions' 	=> 'exento',
			'observations'		=> 'gran obra social',
		));

		Medicalinsurance::create(array(
			'name' 		=> 'Obra social 3',
			'address'	=> 'Direccion de obra social 3',
			'city'		=> 'Ciudad de obra social ',
			'province'	=> 'Provincia de obra social',
			'zip_code'  => 'Codigo postal de obra social',
			'phone'		=> '1111111',
			'cell_phone'=> '5555555',
			'fax'		=> '3333333',
			'email'		=> 'obrasocial1@gmail.com',
			'cuit'		=> '123456789',
			'iva_conditions' 	=> 'exento',
			'observations'		=> 'gran obra social',
		));
	}
}