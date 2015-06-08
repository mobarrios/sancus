<?php
	//Permission Routes	
	
	$modelUpperCase = Config::get('constants.PERMISSION_MODEL_NAME_UPPER_CASE');
	$controller 	= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME').'Controller';
	$module 		= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');

	//variables
	$moduleNewPathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
	$moduleEditPathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
	$moduleDeletePathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');
	$moduleUpdatePathMethodGET	= Config::get('constants.'.$modelUpperCase.'_UPDATE_PATH_METHOD_GET');

	$moduleNewPathMethodPOST 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
	$moduleEditPathMethodPOST 	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');

	//GET
	Route::get($moduleEditPathMethodGET.'/{id?}', 						array('as' => $moduleEditPathMethodGET,   'uses'	=> $controller.'@getEdit'));
	Route::get($moduleUpdatePathMethodGET.'/{id?}/{type?}/{bool?}',  	array('as' => $moduleUpdatePathMethodGET, 'uses' 	=> $controller.'@getUpdate'));