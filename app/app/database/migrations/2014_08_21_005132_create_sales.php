<?php

use Illuminate\Database\Migrations\Migration;

class CreateSales extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->date('sale_date');		   
		   $newtable->float('amount');

		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   //relations
		   $newtable->integer('client_id')->nullable()->unsigned();
		   $newtable->foreign('client_id')->references('id')->on('clients');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales');		
	}

}