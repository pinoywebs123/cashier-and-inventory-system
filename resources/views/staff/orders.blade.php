@extends('template.default')

@section('styles')
<style type="text/css">
	body{
		background: #34495e;
	}
	
	
</style>
@endsection


@section('contents')
	<div class="row">
		<p class="text-center"><img src="{{URL::to('images/b1.png')}}"></p>
		<div id="datacontent" class="row well">
			<div class="col-md-9 row">
				@if(Session::has('del'))
					<div class="alert alert-danger">
						{{Session::get('del')}}
					</div>
				@endif
				@if(Session::has('pay_order'))
					<div class="alert alert-info">
						{{Session::get('pay_order')}}
					</div>
				@endif
				<table class="table table-bordered row">
					<thead>
						<tr>
							<td>Item Code</td>
							<td>Name</td>
							<td>Quantity</td>
							<td>Price</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $morls)
							<tr>
								<td>{{$morls->item->item_code}}</td>
								<td>{{$morls->item->name}}</td>
								<td>
									<form action="{{route('staff_order_to_pay', ['order_id'=> $morls->id])}}" method="POST">
									<input type="integer" name="quantity" class="form-control" value="1" required="">
								</td>
								<td>{{$morls->item->price}}</td>
								<td>
									
										<a href="{{route('staff_delete_order', ['order_id'=> $morls->id])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
										
										<button type="submit" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
										{{csrf_field()}}
									</form>
								</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-3 row">
				<ul class="nav nav-pills nav-stacked row text-center">
					  <li role="presentation" ><a href="{{route('staff_main')}}">INVENTORY</a></li>
					  <li role="presentation" ><a href="{{route('staff_items')}}">ITEMS</a></li>
					  <li role="presentation" class="active"><a href="{{route('staff_orders')}}">ORDERS</a></li>
					  <li role="presentation"><a href="{{route('staff_totals')}}">TOTALS</a></li>
					  <li role="presentation"><a href="{{route('staff_reports')}}">REPORTS</a></li>
					  <li role="presentation"><a href="#">Name: {{Auth::user()->email}}</a></li>
					  <li role="presentation"><a href="{{route('staff_logout')}}">Logout</a></li>
					</ul>
			</div>
		</div>
	</div>
@endsection


@section('scripts')

@endsection