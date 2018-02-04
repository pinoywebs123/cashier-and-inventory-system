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
				@if(Session::has('total_pay'))
					<div class="alert alert-success">
						{{Session::get('total_pay')}}
					</div>
				@endif
				<table class="table table-bordered row">
					<thead>
						<tr>
							<td>Item Code</td>
							<td>Name</td>
							<td>Quantity</td>
							<td>Price</td>
							<td>Sub Total</td>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $morls)
							<tr>
								<td>{{$morls->item_code}}</td>
								<td>{{$morls->item($morls->item_code)->name}}</td>
								<td>{{$morls->quantity}}</td>
								<td>{{$morls->item($morls->item_code)->price}}</td>
								<td>{{$morls->sub_total}}</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
				<h3>Total: P{{$total}}</h3>

				<div class="col-md-4 col-md-offset-4">
					<a href="{{route('staff_total_payment')}}" class="btn btn-success btn-lg btn-block">SUBMIT</a>
				</div>
			</div>
			<div class="col-md-3 row">
				<ul class="nav nav-pills nav-stacked row text-center">
					  <li role="presentation" ><a href="{{route('staff_main')}}">INVENTORY</a></li>
					  <li role="presentation" ><a href="{{route('staff_items')}}">ITEMS</a></li>
					  <li role="presentation" ><a href="{{route('staff_orders')}}">ORDERS</a></li>
					  <li role="presentation" class="active"><a href="{{route('staff_totals')}}">TOTALS</a></li>
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