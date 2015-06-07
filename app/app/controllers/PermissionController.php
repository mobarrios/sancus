<?php

class PermissionController extends BaseController
{
	public function getEdit($profile_id = null)
	{
		$data['modules'] 	= Module::all();
		$data['profile_id'] = $profile_id;

		return View::make('permissions.form')->with($data);
	}

	public function getUpdate($permissions_id = null , $permissions_value = null , $bool)
	{
		error_log("llego");
		$permissions 					 = Permission::find($permissions_id);
		$permissions->$permissions_value = $bool ;
		$permissions->save();

		return Response::json(true);
	}
}