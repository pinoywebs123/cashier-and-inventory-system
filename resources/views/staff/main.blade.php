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
			@if(Session::has('add_ok'))
				<div class="alert alert-success">
					{{Session::get('add_ok')}}	
				</div>
			@endif
			<div class="col-md-9 row">
				<a href="#" class="btn btn-danger btn-xs row" data-toggle="modal" data-target="#delivery">New Delivery</a>
				<table class="table table-bordered row">
					<thead>
						<tr>
							<td>Item Code</td>
							<td>Name</td>
							<td>Quantity Received</td>
							<td>Quantity Remaining</td>
							<td>Price</td>
							<td>Date Delivered</td>
						</tr>

					</thead>
					<tbody>
						@foreach($items as $morls)
							<tr>
								<td>{{$morls->item_code}}</td>
								<td>{{$morls->name}}</td>
								<td>{{$morls->quantity}}</td>
								<td>{{$morls->item($morls->item_code)->quantity}}</td>
								<td>{{$morls->price}}</td>
								<td>{{$morls->created_at->toDayDateTimeString()}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-3 row">
				<ul class="nav nav-pills nav-stacked row text-center">
					  <li role="presentation" class="active"><a href="{{route('staff_main')}}">INVENTORY</a></li>
					  <li role="presentation"><a href="{{route('staff_items')}}">ITEMS</a></li>
					  <li role="presentation"><a href="{{route('staff_orders')}}">ORDERS</a></li>
					  <li role="presentation"><a href="{{route('staff_totals')}}">TOTALS</a></li>
					  <li role="presentation"><a href="{{route('staff_reports')}}">REPORTS</a></li>
					  <li role="presentation"><a href="#">Name: {{Auth::user()->email}}</a></li>
					  <li role="presentation"><a href="{{route('staff_logout')}}">Logout</a></li>
					</ul>
			</div>
		</div>
	</div>

	<div class="modal fade" id="delivery">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="text-center">New Delivery Items</h3>
				</div>
				<div class="modal-body">
					<form action="{{route('staff_new_inventory')}}" method="POST">
						<div class="form-group">
							<label>Item Code</label>
							<input type="text" name="item_code" class="form-control" required="" maxlength="20">
						</div>
						<div class="form-group">
							<label>Item Name</label>
							<input type="text" name="item_name" class="form-control"  required="" maxlength="20">
						</div>
						<div class="form-group">
							<label>Quantity</label>
							<input type="number" name="item_quantity" class="form-control"  required="" maxlength="20">
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="numer" name="item_price" class="form-control"  required="" maxlength="20">
						</div>
						<div class="form-group">
							{{csrf_field()}}
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="button" class="btn btn-default">Clear</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')

@endsection