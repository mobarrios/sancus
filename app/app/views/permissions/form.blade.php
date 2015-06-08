@extends('template')
	@section('menu')
		@include('menu')
	@endsection

	@section('content')

		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title"></h3>
			  </div>
			  <div class="panel-body">				
			
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>{{Lang::get('module.module')}}</th>
								<th>{{Lang::get('module.read')}}</th>
								<th>{{Lang::get('module.edit')}}</th>
								<th>{{Lang::get('module.add')}}</th>
								<th>{{Lang::get('module.delete')}}</th>
							</tr>
						</thead>
						<tbody>							
								@foreach($modules as $module)
								<tr>
									<td>{{Lang::get("module.$module->name")}}</td>
									@foreach( Module::permissionsProfiles($profile_id, $module) as $permissions )
										<td><input permissions_type="read"  	permissions_id="{{$permissions->id}}" type="checkbox" class="ck form_control" @if($permissions->read   == 1) {{'checked'}} @endif</td>
										<td><input permissions_type="edit"  	permissions_id="{{$permissions->id}}" type="checkbox" class="ck form_control" @if($permissions->edit   == 1) {{'checked'}} @endif</td>
										<td><input permissions_type="add"   	permissions_id="{{$permissions->id}}" type="checkbox" class="ck form_control" @if($permissions->add    == 1) {{'checked'}} @endif</td>
										<td><input permissions_type="delete"  	permissions_id="{{$permissions->id}}" type="checkbox" class="ck form_control" @if($permissions->delete == 1) {{'checked'}} @endif</td>
									@endforeach															
								</tr>
								@endforeach							
						</tbody>
					</table>
				</div>
				
			  </div>
		</div>

	
	@endsection

	@section('js')
		<script type="text/javascript">
		
			$('.ck').on('click',function(){
				var value;
				var id 		= $(this).attr('permissions_id');
				var type 	= $(this).attr('permissions_type');

				if($(this).is(':checked'))
				{
					value = 1;
				}else{
					value = 0;
				}

				$.ajax({
					    type: "GET",
					    url: "permisos_update/"+id+"/"+type+"/"+value,
					    dataType: "json",
							  success: function(data){
							  	//alert('Dato Editado Correctamente!');
					    		},                            
					});


			});
		</script>
	@endsection
@stop