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
				@if(Session::has('get_oder'))
					<div class="alert alert-success">
						{{Session::get('get_oder')}}
					</div>
				@endif
				<table class="table table-bordered row">
					<thead>
						<tr>
							<td>Item Code</td>
							<td>Name</td>
							<td>Quantity</td>
							<td>Price</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $morls)
							<tr>
								<td>{{$morls->item_code}}</td>
								<td>{{$morls->name}}</td>
								<td>{{$morls->quantity}}</td>
								<td>{{$morls->price}}</td>
								<td>
									@if($morls->order)
										<button class="btn btn-success btn-xs" disabled="">Selected</button>
									@else
										<a href="{{route('staff_select_order', ['item_id'=> $morls->id])}}" class="btn btn-danger btn-xs">Order</a>
									@endif
									
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-3 row">
				<ul class="nav nav-pills nav-stacked row text-center">
					  <li role="presentation" ><a href="{{route('staff_main')}}">INVENTORY</a></li>
					  <li role="presentation" class="active"><a href="{{route('staff_items')}}">ITEMS</a></li>
					  <li role="presentation"><a href="{{route('staff_orders')}}">ORDERS</a></li>
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