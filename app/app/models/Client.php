<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Client extends Eloquent
{
	/** 
     * Soft Delete
	 */
	//use SoftDeletingTrait;
    //protected $dates = ['deleted_at'];

	protected $table	 = 'clients';
	protected $guarded	 = array('');


	public function Sales()
	{
		return $this->hasMany('Sales');
	}

	public function ClientsPayment()
	{
		return $this->hasMany('ClientsPayment');
	}

	public function medicalinsurance()
	{
		return $this->belongsTo('Medicalinsurance');
	}

	public function medicalinsuranceplan()
	{
		return $this->belongsTo('Medicalinsuranceplan');
	}

}

?>