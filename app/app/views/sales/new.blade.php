@extends('template')

	@section('menu')
		@include('menu')
	@endsection

	@section('content')

		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title">{{Lang::get("module.$module")}} : {{Lang::get("action.$action")}}</h3>
			  </div>
			  <div class="panel-body">				

					{{Form::open(array('url'=>Config::get('constants.SALE_ADDITEM_PATH_METHOD_POST'), 'id'=>'form_add_item'))}}
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

					    <div class="panel panel-default">

					      <div class="panel-heading" role="tab" id="headingTwo">
					        <h4 class="panel-title">
					          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="collapseTwo">
					          {{Lang::get('sales.data')}}
					          </a>
					        </h4>
					      </div>

					      <div id="2" class="panel-collapse collapse in " role="tabpanel" aria-labelledby="headingTwo">
					        <div class="panel-body">    
					        	@if(Session::has('data'))
					        		<input type="text" value="{{Session::get('data')['date']}}" class="form-control" disabled>
					        	@else
					          		{{ Form::date('date') }}   
					          	@endif
					           <br>
					         	<input class="form-control" placeholder='Cliente' id="client_name" value="{{Session::get('data')['client_name']}}">
					         	<input type="hidden" name="client_id" id="client_id" data-id="{{Session::get('data')['client_id']}}" value="{{Session::get('data')['client_id']}}">
					        </div>
					      </div>

					    </div>

					    <div class="panel panel-default">

						      <div class="panel-heading" role="tab" id="headingThree">
						        <h4 class="panel-title">
						          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="collapseThree">
						           {{Lang::get('sales.doctor')}}
						          </a>
						        </h4>
						      </div>

						      <div id="4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">  
						        <div class="panel-body">
									<div class="col-xs-12">
										{{Form::doctor('doctor_id', Lang::get('sales.doctor'))}}
										{{Form::doctorscore('doctorscore', Lang::get('sales.doctorScore'))}}
									</div>								
						        </div>
						      </div>
						      
					    </div>

					    <div class="panel panel-default">

						      <div class="panel-heading" role="tab" id="headingThree">
						        <h4 class="panel-title">
						          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="collapseThree">
						           {{Lang::get('sales.paymentOption')}}
						          </a>
						        </h4>
						      </div>

						      <div id="4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">  
						        <div class="panel-body">
									<div class="col-xs-12">
										{{Form::paymentoption('paymentoption_id', Lang::get('sales.paymentOption'))}}
									</div>								
						        </div>
						      </div>

					    </div>

					    <div class="panel panel-default">

						      <div class="panel-heading" role="tab" id="headingThree">
						        <h4 class="panel-title">
						          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="collapseThree">
						            Articulos
						          </a>
						        </h4>
						      </div>

						      <div id="4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">  
						        <div class="panel-body">
									<div class="col-xs-12">
										<input class="form-control" placeholder='Articulo' id="item" data-id="">
										<input type="hidden" id="item_id" name="item_id" data-id="">
									</div>
									<hr>							
									<div class="col-xs-2">
										<input class="form-control" placeholder='Cantidad' id='cantidad' name="cantidad">
									</div>
									<div class="col-xs-2">
										  <input class="form-control" placeholder='$' id='price' name="price_per_unit">
									</div>

									<div class="col-xs-8">
										<input class="form-control" placeholder='Observaciones' id='observations' name="observations">
									</div>
									<br>
									<br>
									<div class="col-xs-12">
										<a id='add_item' class='btn btn-xs btn-success'><span class="fa fa-plus"></span> Agregar </a>
									</div>
									{{Form::close()}}
						        </div>
						      </div>
					    </div>

					    <br>

					    <table class="table table-striped table-hover  table-responsive">
					    	<thead>
					    		<tr>
					    			<th>Cod.</th>
					    			<th>Cant.</th>
					    			<th>Articulo</th>
					    			<th>$ Unit.</th>
					    			<th>S. Total</th>
					    			<th></th>
					    		</tr>
					    	</thead>
					    	<tfoot>
					    		<tr>
					    			<td></td>
					    			<td></td>
					    			<td></td>
					    			<td><strong>Total</strong></td>
					    			<td> $ <strong>{{Session::get('array_total')}}</strong></td>
					    			<td></td>
					    		</tr>
					    	</tfoot>
					    	<tbody id='table_items_body'>
					    		@if(Session::has('array_items'))

					    			@foreach(Session::get('array_items') as $item => $key)
					    			<tr>
					    				<td>{{$key['code']}} </td> 
					    				<td>{{$key['cantidad']}}</td>	
					    				<td>{{$key['description']}}</td>
					    				<td> $ {{$key['$']}}</td>
					    				<td> $ {{$key['subtotal'] }}</td>	
					    				<td><a href="{{route(Config::get('constants.SALE_DELETEITEM_PATH_METHOD_GET'), $item )}}" class="del_confirm pull-right"><i class="fa fa-remove"></i></a>
					    				</td>	    			
					    			</tr>
					    			@endforeach
					    		@endif
					    	</tbody>	    	
					    </table>
			
						<hr>		 
					  	<a href="{{route('sales_cancel')}}" id="cancel" class="del btn btn-danger">Cancelar</a>
					 	<a id="process" class="btn btn-success">Procesar</a>
					</div>
			  </div>
		</div>

		<!--- MODAL -->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Content will be loaded here from "remote.php" file -->
				</div>
			</div>
		</div>
		<!-- END MODAL -->


	@endsection

	@section('js')
		<script type="text/javascript">
			    
				$('#process').on('click',function()
				{
					$.ajax({
						type: "GET",
						url: "process_sales",
						dataType: "json",
						  success: function(data){

								if(data != null)
								{
									window.location.href = "inicio";
									window.open('remito_sales/'+data , '_blank');	
									
								}
						 	},
						 	error: function() {
                                alert('Error Procesando Pedido.');
                             }   
						});
				});

	     		$("#client_name").autocomplete({    
					source: function(request, response) {
						$.ajax({
							type: "POST",
							url: '{{Config::get("constants.CLIENT_SEARCH_PATH_METHOD_POST")}}',
							data:  {search : $("#client_name").val() },
							dataType: "json",
								success: function(data){
								response(data);
							}                            
						});
					},
					select: function(event, ui) {
						$('#client_id').val(ui.item.id);
						$('#client_id').attr('data-id',ui.item.id);
					}
			  	});
			
				$("#item").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            type: "POST",
                            url: '{{Config::get("constants.ITEM_SEARCH_PATH_METHOD_POST")}}',
                            data:  {search : $("#item").val() },
                            dataType: "json",
      						  success: function(data){
								//$.each(data, function(key, value) {
								//	console.log (key);
								//});

								response(data);
                            },                            
                        });

                    },
                    select: function(event, ui) {
                   		//setea el id al attr data-id del input  item
                   		$('#item_id').val(ui.item.id);
                   		$('#item_id').attr('data-id',ui.item.id);
                   		$('#price').val(ui.item.sell_price);
                   		$('#cantidad').val(1);

                	}
                });

				$('#del_item').on('click',function(){
					arr_item.splice(0,$(this).attr('data-id'));
					console.log(arr_item);
				});

 				$('#add_item').on('click',function(){

 					if($('#client_id').val() == "")
 					{
 						alert('Completar Cliente');
 					}
 					else
 					{
 						$('#form_add_item').submit();
 					}
			  		

 				});
				
		</script>
	@endsection
@stop