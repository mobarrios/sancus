<?php

use Illuminate\Database\Migrations\Migration;

class CreateDoctorsMedicalinsurances extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctors_medicalinsurances', function($newtable)
        {		   
           $newtable->increments('id');
           $newtable->integer('doctor_id')->nullable()->unsigned();
		   $newtable->integer('medicalinsurance_id')->nullable()->unsigned();
		   		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   $newtable->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
		   $newtable->foreign('medicalinsurance_id')->references('id')->on('medicalinsurances')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{		
		Schema::drop('doctors_medicalinsurances');	
	}

}