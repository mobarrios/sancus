<?php


class Medicalinsurance extends Eloquent
{
	protected $table 	= 'medicalinsurances';
	protected $guarded 	= array('');

	public function doctors()
	{
		return $this->belongsToMany('Doctor', 'doctors_medicalinsurances', 'doctor_id', 'medicalinsurance_id');
	}
}