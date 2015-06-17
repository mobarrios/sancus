<?php
	//Clients Routes	
	
	$modelUpperCase = Config::get('constants.CLIENT_MODEL_NAME_UPPER_CASE');
	$controller 	= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME').'Controller';
	$module 		= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');

	//variables
	$moduleNewPathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
	$moduleEditPathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
	$moduleDeletePathMethodGET 	= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');

	$moduleNewPathMethodPOST 	= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
	$moduleEditPathMethodPOST 	= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');

	$moduleSearchPathMethodPOST	= Config::get('constants.'.$modelUpperCase.'_SEARCH_PATH_METHOD_POST');
	


	//GET
	Route::get($module.'/{model?}/{search?}', 		array('as' => $module, 						'uses'  => $controller.'@getIndex'));
	Route::get($moduleNewPathMethodGET, 			array('as' => $moduleNewPathMethodGET,		'uses'  => $controller.'@formModal'));
	Route::get($moduleEditPathMethodGET.'/{id?}',	array('as' => $moduleEditPathMethodGET,		'uses'	=> $controller.'@formModal'));
	Route::get($moduleDeletePathMethodGET.'/{id?}',	array('as' => $moduleDeletePathMethodGET,	'uses'	=> $controller.'@getDel'));
	
	//POST
	Route::post($moduleNewPathMethodPOST, 			array('as' => $moduleNewPathMethodPOST, 	'uses' 	=> $controller.'@postNew'));
	Route::post($moduleEditPathMethodPOST.'/{id?}', array('as' => $moduleEditPathMethodPOST, 	'uses' 	=> $controller.'@postEdit'));

	Route::post($moduleSearchPathMethodPOST, function()
	{
			$data = Input::get('search');
			$resp = Client::where('name','like','%'.$data.'%')
					->orWhere('last_name','like','%'.$data.'%')
					->orWhere('dni','like','%'.$data.'%')
					->get();
			$res  = array();
			foreach($resp as $r)
			{
				$res[] = array(
								'id' => $r->id , 
								'label' => $r->name .' '.$r->last_name,
								'medicalinsurance' => $r->medicalinsurance->name,
								'medicalinsuranceplan' => $r->medicalinsuranceplan->name );
			}
			return Response::json($res);
	});