<?php

class MeasurementunitController extends BaseController
{
	protected $data  	 	= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$this->data = BaseController::setDataArray(Config::get('constants.MEASUREMENTUNIT_MODEL_NAME'));		

		$this->search_by =  array('name');
	}
}

?>