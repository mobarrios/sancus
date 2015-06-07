<?php
 
class Module extends Eloquent
{
	protected $table = 'modules';

	public function permission()
	{
		return $this->hasMany('Permission');
	}

	public static function permissionsProfiles($id_profiles = null, $module = null)
    {
        return Permission::where('profile_id','=',$id_profiles)->where('module_id','=',$module->id)->get();
    }
}