@extends('front.master')
@section('title','Wishlist Page')
@section('content')
<div class="container">
	<center>
		<h3>Wishlist Products</h3>
		<br>
		<br>
		<br>
		</center>
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
	<div class="row">
			
		<?php 
		if($products->isEmpty())
		{
		?>
	
		<h3>Sorry , products not found</h3>
		
		<?php } else { ?>
		
	
		@foreach($products as $product)

		<div class="col-md-4 shadow" style="border:20px solid #cff" >
			<div class="text-center">
				<a href="{{url('/product_details',$product->id)}}">
				<img src="uploads/bu_images/{{$product->image}}" width="300px" height="300px">
				</a>
				
				<h2>{{$product->price}}</h2>
				
				<p><a href="{{url('/product_details',$product->id)}}">
					{{$product->small_dis}}
					</a>
				</p>
				<a href="{{url('cart/addItem',$product->id)}}" class="btn btn-info" style="background:#0bf">Add To Cart</a>
				@if(Auth::user()->id == $product->user_id)
				<a href="{{url('/')}}/removeWishList/{{$product->id}}" class="btn btn-danger">Remove from wishlist</a>
				@else
		
				@endif
			</div>
		</div>
		@endforeach
		<?php }?>
	</div>
</div>

@endsection