<?php

class SaleController extends BaseController
{
	protected $data 		= array();
	protected $search_by 	= array();

	public function __construct()
	{
		$this->data 		= BaseController::setDataArray(Config::get('constants.SALE_MODEL_NAME'));
		$this->search_by 	= array('sales_date','clients_id');
	}

	public function getCancel()
	{
		Session::forget('array_items');
		Session::forget('array_total');
		Session::forget('data');

		return Redirect::back()->with('success',"Venta Cancelada");
	}

	public function getList($model= null , $search = null)
	{
		$model 						= $this->data['model'];
		$this->data['seccion']		= 'Inicio';

		if(isset($search))
		{
			$mod  = $model::where('id','like','%'.$search.'%');
			
			foreach($this->search_by as $col)
			{
				$mod = $mod->orWhere($col,'like','%'.$search.'%');
			
			}

			$mod  = $mod->paginate('10');

			$this->data['model'] 	= $mod;
		}else
		{
			$this->data['model'] 	= $model::orderBy('id' ,'ASC')->paginate('10');
		}
	
		return View::make('sales.sales_view')->with($this->data);
	}

	public function getProcess()
	{
		$datos = Session::get('data');
		$total = Session::get('array_total');
		$items = Session::get('array_items');

		$sale 			  		= new Sales();
		$sale->sales_date  		= $datos['date'];
		$sale->amount	  		= $total;
		$sale->clients_id  		= $datos['client_id'];
		$sale->save();

		foreach($items as $item => $key)
		{
			$items 					= new SalesItems();
			$items->quantity 		= $key['cantidad'];	
			$items->observations 	= $key['observations'];
			$items->price_per_unit  = $key['$'];
			$items->sales_id 		= $sale->id;
			$items->items_id 		= $key['item_id'];
			$items->save();


			// resta la cantidad del stock del articulo
			$item_stock 			= Item::find($key['item_id']);
			$item_stock->stock 		= $item_stock->stock - $key['cantidad'];
			$item_stock->save() ;

		}	

		Session::forget('array_items');
		Session::forget('array_total');
		Session::forget('data');

		return Response::json($sale->id);
	}

	public function getRemito($id)
	{	
		$purchase_id = $id;

		$data['sales'] 		= Sales::find($id);
		$data['company']	= Company::all()->first();
		$data['total']		= 0;
		$data['totaltotal'] = 0;

		$pdf = PDF::loadView('remito.remito_sale',$data)->stream('remito.pdf');

		return $pdf;
	}

	public function getNew()
	{
		$this->data['action']		= 'new';
		
		return View::make('sales.new')->with($this->data);
	}

	public function postAdditem()
	{
		$date_sales		 		= Input::get('date');
		$client_id_sales 		= Input::get('client_id');
		$medicalInsurance 		= Input::get('medicalinsurance');
		$medicalInsurancePlan 	= Input::get('medicalinsuranceplan');
		$doctorId				= Input::get('doctor_id');
		$doctorscore			= Input::get('doctorscore');
		$paymentOptionId		= Input::get('paymentoption_id');

		//datos del remito
		if(!Session::has('data'))
		{	
			$client 	= Client::find($client_id_sales);
			$data 		= array(
									'date'				=> $date_sales,
									'client_id'			=> $client_id_sales, 
									'client_name'		=> $client->name,
									'client_last_name' 	=> $client->last_name,
									'medicalinsurance' 	=> $medicalInsurance,
									'medicalinsuranceplan' 	=> $medicalInsurancePlan,
									'doctor_id'				=> $doctorId,
									'doctorscore'			=> $doctorscore,
									'paymentoption_id'		=> $paymentOptionId,
								);
			error_log("Data array : ".http_build_query($data));
			Session::put('data',$data);			
		}
		

		//items de remito
		
		$item 			= Item::find(Input::get('item_id'));

		if(!Session::has('array_items'))
		{	
			$array_items 	= array();
		}
		else
		{
			$array_items 	= Session::get('array_items');
		}


		$item 	= array('item_id'		=> Input::get('item_id'),
						'code'			=> $item->code, 
						'description' 	=> $item->name .' '.$item->description, 
						'$' 			=> Input::get('price_per_unit'),
						'cantidad' 		=> Input::get('cantidad'), 
						'observations'	=> Input::get('observations'), 
						'subtotal' 		=> Input::get('price_per_unit') * Input::get('cantidad')
						);

		array_push($array_items, $item);

		Session::put('array_items',$array_items);

		$total = 0;

		foreach($array_items as $item => $key) 
		{
			$total = $total + $key['subtotal'];
		}
	
		Session::put('array_total',$total);

		return Redirect::back()->withInput();
	
	}

	public function getDelitem($id = null)
	{
		$array_items = Session::get('array_items');
		
		unset($array_items[$id]);

		Session::put('array_items',$array_items);

		$total = 0;

		foreach($array_items as $item => $key) 
		{
			$total = $total + $key['subtotal'];
		}	

		Session::put('array_total',$total);


		return Redirect::back();
	}

	public function postDeleteitem()
	{
		$input 			= Input::all();
		$item_id		= Crypt::decrypt($input['item_id']);

		SalesItems::find($item_id)->delete();

		$data['module'] = $this->module;
		$data['total']  = null;

		return View::make('stock.sales.new')->with($data);
	}

	public function postNewsales()
	{
		$sales_temporal_id		= Session::get('purchase_temporal_id');
		$purchasesitems 		= PurchasesItems::where('purchase_temporal_id','=',$purchase_temporal_id)->get();
		
		$amount 	 	 		 = 0;

		// Calculating amount
		foreach( $purchasesitems as $purchases_item )
		{
			$amount = $amount + ( $purchases_item->price_per_unit * $purchases_item->quantity * ( 1 - $purchases_item->discount * 0.01 ) );
		}

		// Check if the purchase has items
		if(count($purchasesitems) < 1)
		{
			return Redirect::to('purchase/new')->with('warning',"La compra debe tener por lo menos un articulo");
		}

		$input 			  		= Input::all();
	
		$model			  		= PurchasesTemporal::find($purchase_temporal_id);
		$model->purchase_date 	= $input['date'];		
		$model->amount    		= $amount;
		$model->provider_id 	= $input['provider_id'];
		
		$purchase 			  		= new Purchases();
		$purchase->purchase_date  	= $model->purchase_date;
		$purchase->amount	  		= $model->amount;
		$purchase->provider_id  	= $model->provider_id;
		$purchase->save();

		$model->purchase_id   		= $purchase->id;

		$model->update();

		foreach( $purchasesitems as $purchases_item )
		{
			$purchases_item->purchase_id = $purchase->id;
			$purchases_item->update();
		}

		return Redirect::to('purchase')->with('success',"Venta Numero: $purchase->id  Creada Correctamente");

	}

	public function getView($id)
	{
		$id 			= Crypt::decrypt($id);

		$model 			= Purchases::find($id);

		$data['model'] 	= $model;
		$data['module'] = $this->module;
		$data['total']  = null;

		return View::make('stock.sales.view')->with($data);
	}

}