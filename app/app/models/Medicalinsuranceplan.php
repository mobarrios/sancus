<?php


class Medicalinsuranceplan extends Eloquent
{
	protected $table 	= 'medicalinsurancesplans';
	protected $guarded 	= array('');

	public function medicalinsurance()
	{
		return $this->belongsTo('Medicalinsurance');
	}
}