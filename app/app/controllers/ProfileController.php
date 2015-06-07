<?php

class ProfileController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data = BaseController::setDataArray(Config::get('constants.PROFILE_MODEL_NAME'));
	}

}

?>