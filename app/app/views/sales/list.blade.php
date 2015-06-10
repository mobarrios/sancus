
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Total</th>
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td><p class="btn btn-xs btn-link">{{$models->id}}</p></td>
					<td>{{$models->sales_date}}</td>
					<td>{{$models->Clients->company_name}} : {{$models->Clients->last_name}} {{$models->Clients->name}}</td>
					<td>$ {{$models->amount}}</td>
					<td>
						<div class="btn-group btn-group-xs pull-right">
							<a href="{{route('sales_remito',$models->id)}}" target="self" class="btn btn-default"><i class="fa fa-print"></i></a>
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-danger"><i class="fa fa-remove"></i></a>
							
						</div>
					</td>
				</tr>
				@endforeach

		</tbody>
	</table>

	<ul class="pagination">
		{{ $model->links() }}
	</ul>

</div>