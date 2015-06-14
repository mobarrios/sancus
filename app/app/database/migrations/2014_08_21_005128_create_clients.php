<?php

use Illuminate\Database\Migrations\Migration;

class CreateClients extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 100);
		   $newtable->string('last_name', 100);
		   $newtable->string('dni', 20);
		   $newtable->string('address', 200);
		   $newtable->string('email', 100);
		   $newtable->string('phone', 100);
		   $newtable->string('cell_phone', 100);
		   $newtable->string('company_name', 100);
		   $newtable->string('cuit', 20);		   

		   $newtable->timestamps();
		   $newtable->softDeletes();

		   //relations

		   $newtable->integer('medicalinsuranceplan_id')->nullable()->unsigned();
		   $newtable->foreign('medicalinsuranceplan_id')->references('id')->on('medicalinsurancesplans');

		   $newtable->integer('medicalinsurance_id')->nullable()->unsigned();
		   $newtable->foreign('medicalinsurance_id')->references('id')->on('medicalinsurances');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}
}