<?php


class Medicalinsurance extends Eloquent
{
	protected $table 	= 'medicalinsurances';
	protected $guarded 	= array('');

	public function doctors()
	{
		return $this->belongsToMany('Doctor', 'doctors_medicalinsurances', 'doctor_id', 'medicalinsurance_id');
	}

	public function medicalinsurancesplans()
	{
		return $this->hasMany('Medicalinsurancesplan');
	}
}