@extends('front.master')
@section('title','Order Page')
@section('content')
<style>
	table td {
		padding: 20px;
	}
</style>
<section id="cart_items">
	<div class="container">
		<br>
		<div class="row">
		<div class="col-md-4 well well-sm">
			<div class="card text-dark bg-light  mb-3" style="max-width: 18rem;">
  <div class="card-header ">Profile Menu</div>
  <div class="card-body ">
  @include('profile.menu')
  </div>
</div>
		
		</div>
			<div class="col-md-8 ">
			
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
							<td class="name">Name</td>
                            <td class="code">Code</td>
                            
                            <td class="status">Status</td>
                            
                            <td class="total">Total</td>
                            <td>Created at</td>
                        </tr>
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        @if(session('error'))

                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        </thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								
								<td>
									{{$order->pro_name}}
								</td>
								<td>
									{{$order->pro_code}}
								</td>
								<td>
									{{$order->status}}
								</td>
								
								<td>
									{{$order->total}}
								</td>
								<td>
									{{$order->created_at}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table></div>
                   	
		</div>
	</div>
	</div>
</section>

@endsection