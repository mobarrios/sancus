<?php

use Illuminate\Database\Migrations\Migration;

class CreateMedicalinsurancesplans extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicalinsurancesplans', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 100);
		   $newtable->longText('description');
		   
		   $newtable->timestamps();
		   $newtable->softDeletes();

		   //relations
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
		Schema::drop('medicalinsurancesplans');
	}
}