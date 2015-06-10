<?php
	//Sales Routes

	$modelUpperCase = Config::get('constants.SALE_MODEL_NAME_UPPER_CASE');
	$controller 	= Config::get('constants.'.$modelUpperCase.'_MODEL_NAME').'Controller';
	$module 		= Config::get('constants.'.$modelUpperCase.'_MODULE_NAME');

	//variables
	$moduleNewPathMethodGET 		= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_GET');
	$moduleEditPathMethodGET 		= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_GET');
	$moduleDeletePathMethodGET 		= Config::get('constants.'.$modelUpperCase.'_DELETE_PATH_METHOD_GET');
	$moduleListPathMethodGET 		= Config::get('constants.'.$modelUpperCase.'_LIST_PATH_METHOD_GET');
	$moduleNewmodalPathMethodGET	= Config::get('constants.'.$modelUpperCase.'_NEWMODAL_PATH_METHOD_GET');
	$moduleEditmodalPathMethodGET	= Config::get('constants.'.$modelUpperCase.'_EDITMODAL_PATH_METHOD_GET');
	$moduleDeleteitemPathMethodGET	= Config::get('constants.'.$modelUpperCase.'_DELETEITEM_PATH_METHOD_GET');
	$moduleProcessPathMethodGET		= Config::get('constants.'.$modelUpperCase.'_PROCESS_PATH_METHOD_GET');
	$moduleCancelPathMethodGET		= Config::get('constants.'.$modelUpperCase.'_CANCEL_PATH_METHOD_GET');
	$moduleReceiptPathMethodGET		= Config::get('constants.'.$modelUpperCase.'_RECEIPT_PATH_METHOD_GET');
	
	$moduleNewPathMethodPOST 		= Config::get('constants.'.$modelUpperCase.'_NEW_PATH_METHOD_POST');
	$moduleEditPathMethodPOST 		= Config::get('constants.'.$modelUpperCase.'_EDIT_PATH_METHOD_POST');
	$moduleFinishPathMethodPOST		= Config::get('constants.'.$modelUpperCase.'_FINISH_PATH_METHOD_POST');
	$moduleAdditemPathMethodPOST	= Config::get('constants.'.$modelUpperCase.'_ADDITEM_PATH_METHOD_POST');

	//GET
	Route::get($module, 								array('as' => $module, 							'uses'  => $controller.'@getNew'));
	Route::get($moduleListPathMethodGET, 				array('as' => $moduleListPathMethodGET, 		'uses'  => $controller.'@getList'));
	Route::get($moduleNewPathMethodGET, 				array('as' => $moduleNewPathMethodGET,			'uses'  => $controller.'@getNew'));
	Route::get($moduleNewmodalPathMethodGET,			array('as' => $moduleNewmodalPathMethodGET, 	'uses'  => $controller.'@formModal'));
	Route::get($moduleEditmodalPathMethodGET.'/{id?}', 	array('as' => $moduleEditmodalPathMethodGET,	'uses'	=> $controller.'@formModal'));
	Route::get($moduleDeletePathMethodGET.'/{id?}', 	array('as' => $moduleDeletePathMethodGET,		'uses'	=> $controller.'@getDel'));
	Route::get($moduleDeleteitemPathMethodGET.'/{id}',	array('as' => $moduleDeleteitemPathMethodGET, 	'uses'	=> $controller.'@getDelitem'));
	Route::get($moduleProcessPathMethodGET, 	   		array('as' => $moduleProcessPathMethodGET, 		'uses'	=> $controller.'@getProcess'));
	Route::get($moduleReceiptPathMethodGET.'/{id}', 	array('as' => $moduleReceiptPathMethodGET, 		'uses'	=> $controller.'@getRemito'));
	Route::get($moduleCancelPathMethodGET, 				array('as' => $moduleCancelPathMethodGET, 		'uses'  => $controller.'@getCancel'));

	//POST
	Route::post($moduleNewPathMethodPOST, 				array('as' => $moduleNewPathMethodPOST,	 		'uses' 	=> $controller.'@postNew'));
	Route::post($moduleEditPathMethodPOST.'/{id?}',		array('as' => $moduleEditPathMethodPOST, 		'uses' 	=> $controller.'@postEdit'));
	Route::post($moduleFinishPathMethodPOST, 			array('as' => $moduleFinishPathMethodPOST, 		'uses'  => $controller.'@postNewsales'));
	Route::post($moduleAdditemPathMethodPOST, 			$controller.'@postAdditem');
