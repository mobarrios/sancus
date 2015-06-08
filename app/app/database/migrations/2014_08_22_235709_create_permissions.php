<?php

use Illuminate\Database\Migrations\Migration;

class CreatePermissions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function($newtable)
		{
			$newtable->increments('id');
			$newtable->integer('module_id')->nullable()->unsigned();
			$newtable->integer('profile_id')->nullable()->unsigned();			
			$newtable->boolean('read');
			$newtable->boolean('edit');
			$newtable->boolean('delete');
			$newtable->boolean('add');

			$newtable->timestamps();
			$newtable->softDeletes();
			
			$newtable->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
			$newtable->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{		
		Schema::drop('permissions');		
	}

}