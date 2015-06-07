<?php

class DoctorController extends BaseController
{
	protected $data = array();
	protected $search_by =  array();

	public function __construct()
	{
		$this->data = BaseController::setDataArray(Config::get('constants.DOCTOR_MODEL_NAME'));
		
		$this->search_by = array('name','last_name','dni','license');
	}

	public function postNew()
	{
		//Receive data
		$input 		= Input::all();
		
		//Store medicalinsurances
		$medicalinsurances = Input::has('chk_medicalinsurance') ? Input::get('chk_medicalinsurance') : array();
		
		//Clear the input
		unset($input['chk_medicalinsurance']);

		// Create the objet
		$doctor 		= new Doctor($input);
		$doctor->save();

		// Input medicalinsurances
		$doctor->medicalinsurances()->sync($medicalinsurances);

		// Save the object
		$doctor->save();
		
		return Redirect::back();	
	}

	//post edit
	public function postEdit($id = null)
	{	
		//Receive data
		$input 		= Input::all();
		
		//Store medicalinsurances
		$medicalinsurances = Input::has('chk_medicalinsurance') ? Input::get('chk_medicalinsurance') : array();
		
		//Clear the input
		unset($input['chk_medicalinsurance']);

		$doctor 		= Doctor::find($id);

		$doctor->medicalinsurances()->sync($medicalinsurances);		

		$doctor->fill($input);
		$doctor->save();
		
		return Redirect::back();

	}
}

?>