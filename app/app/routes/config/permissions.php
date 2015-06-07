<?php
//Permissions

Route::get('permisos/{id?}', 	array('as' => 'permissions', 'uses'  => 'PermissionController@getEdit'));

Route::get('permisos_update/{id?}/{type?}/{bool?}',  array('as' => 'permissions_update','uses' =>'PermissionController@getUpdate'));
	

?>