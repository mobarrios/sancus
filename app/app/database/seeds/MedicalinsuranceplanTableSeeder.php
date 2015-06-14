<?php

class MedicalinsuranceplanTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Basico de Obra social 1',
			'description'			=> 'Basic Plan',
			'medicalinsurance_id'	=> 1,
		));
		
		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Medio de Obra social 1',
			'description'			=> 'Medium Plan',
			'medicalinsurance_id'	=> 1,
		));
		
		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Premium de Obra social 1',
			'description'			=> 'Premium Plan',
			'medicalinsurance_id'	=> 1,
		));
		
		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Basico de Obra social 2',
			'description'			=> 'Basic Plan',
			'medicalinsurance_id'	=> 2,
		));
		

		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Medium de Obra social 2',
			'description'			=> 'Medium Plan',
			'medicalinsurance_id'	=> 2,
		));
		
		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Premium de Obra social 2',
			'description'			=> 'Premium Plan',
			'medicalinsurance_id'	=> 2,
		));
		
		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Basico de Obra social 3',
			'description'			=> 'Basic Plan',
			'medicalinsurance_id'	=> 3,
		));
		
		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Medium de Obra social 3',
			'description'			=> 'Medium Plan',
			'medicalinsurance_id'	=> 3,
		));

		Medicalinsuranceplan::create(array(
			'name' 					=> 'Plan Premium de Obra social 3',
			'description'			=> 'Premium Plan',
			'medicalinsurance_id'	=> 3,
		));		

	}
}