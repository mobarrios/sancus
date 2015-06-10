<?php

use Illuminate\Database\Migrations\Migration;

class CreateSalesItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_items', function($newtable)
        {		  
           $newtable->increments('id');
           
		   $newtable->integer('quantity');
		   $newtable->float('discount');
		   $newtable->float('price_per_unit');  		   
		   $newtable->timestamps();
		   $newtable->softDeletes();

		   //relations
		   $newtable->integer('sale_id')->nullable()->unsigned();
		   $newtable->foreign('sale_id')->references('id')->on('sales');
           
           $newtable->integer('sale_temporal_id')->nullable()->unsigned();
           $newtable->foreign('sale_temporal_id')->references('id')->on('sales_temporal');
           
           $newtable->integer('item_id')->nullable()->unsigned();  
		   $newtable->foreign('item_id')->references('id')->on('items');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_items');
	}

}