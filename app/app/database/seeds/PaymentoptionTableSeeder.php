<?php

class PaymentoptionTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Paymentoption::create(array(
			'name' 			=> 'efectivo',
		));

		Paymentoption::create(array(
			'name' 			=> 'visa',
		));

		Paymentoption::create(array(
			'name' 			=> 'mastercard',
		));

		Paymentoption::create(array(
			'name' 			=> 'american express',
		));


	}

}