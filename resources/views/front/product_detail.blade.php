@extends('front.master')
@section('title','Product Detail Page')
@section('content')
<div class="container" style="border:1px solid #f90">
	<div class="row">
		<br>
		<br>
		@foreach($products as $product)
		<div class="col-md-5">
		<div class="thumbnall">
			<img class="card-img-top" src="{{url('uploads/bu_images',$product->image)}}" height="400px">
		</div>
		</div>
		<div class="col-md-6">
	<?php //echo ucwords($product->pro_name);?>
			
			<h6>{{$product->small_dis}}</h6>
			<h6>${{$product->price}}</h6>
			<h6>Avaliable:{{$product->stock}}</h6>
			<p>small desc :{{$product->small_dis}}</p>
			<p>large desc :{{$product->large_dis}}</p>
			<span>	
			<a href="{{url('cart/addItem',$product->id)}}" class="btn btn-info"style="background:#0bf">Add To Cart</a>
			<?php
			$wishlistData=DB::table('wishlist')->rightJoin('musers','wishlist.pro_id','=','musers.id')->where('wishlist.pro_id','=',$product->id)->get();
			$count=App\Wishlist::where(['pro_id'=>$product->id])->count();
			if($count=='0'){
				?>
			<form action="{{route('addWishlist')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="pro_id" value="{{$product->id}}">
			<button class="btn btn-warning"style="background:#f70">Add To Wishlist</button>
			</form>
			<?php } else { 
			?>
			<h3>this product already added to wishlist<a href="{{url('/wishlist')}}">Wishlist</a></h3>
			<?php }?>
			</span>
		</div>
		@endforeach
	</div>
	
</div>

@endsection