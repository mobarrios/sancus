<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Sale extends Eloquent
{

	protected $table	 = 'sales';
	protected $guarded	 = array('');

	public function client()
	{
		return $this->belongsTo('Client');
	}

	public function salesItems()
	{
		return $this->hasMany('SalesItems');
	}

	public function clientsPayment()
	{
		return $this->hasMany('ClientsPayment');
	}

	public function getSalesDateAttribute($value)
	{
		$value = date("d-m-Y",	strtotime($value)); 
		return $value;
	}

	public function setSalesDateAttribute($value)
	{
		$fecha = date("Y-m-d",	strtotime($value)); 
		$this->attributes['sales_date']	=	$fecha;
	}

}