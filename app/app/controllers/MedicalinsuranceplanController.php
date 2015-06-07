<?php

class MedicalinsuranceplanController extends BaseController
{
	protected $data 		=  array();
	protected $search_by 	=  array();

	public function __construct()
	{
		$this->data = BaseController::setDataArray(Config::get('constants.MEDICALINSURANCEPLAN_MODEL_NAME'));

		$this->search_by = array('name', 'description');
	}
}