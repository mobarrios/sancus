<?php
 
class Module extends Eloquent
{
	protected $table = 'modules';

	public function permission()
	{
		return $this->hasMany('Permission');
	}

	public static function permissionsProfiles($id_profile, $module)
    {
        return Permission::where('profile_id','=',$id_profile)->where('module_id','=',$module->id)->get();
    }

    public static function checkPermissions($id_profile)
    {
    	$modules = Module::all();

    	foreach ($modules as $module) {
    		$permission = Permission::where('profile_id','=',$id_profile)->where('module_id','=',$module->id)->get();
    		error_log("Permisos array : ". $permission);
    		if($permission->isEmpty()){
    			error_log("Entro en el if de checkPermissions del modulo Module ");
    			$newPermission = new Permission();
    			$newPermission->profile_id 	= $id_profile;
    			$newPermission->module_id 	= $module->id;
    			$newPermission->read 		= false;
    			$newPermission->edit 		= false;
    			$newPermission->delete 		= false;
    			$newPermission->add 		= false;

    			$newPermission->save();
    		}
    	}
    }
}
