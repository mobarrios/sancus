<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Doctor extends Eloquent
{

	protected $table 	= 'doctors';
	protected $guarded 	= array('');

	public function medicalinsurances()
	{
		return $this->belongsToMany('Medicalinsurance', 'doctors_medicalinsurances', 'doctor_id', 'medicalinsurance_id');
	}
}
?>