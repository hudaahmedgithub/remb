@extends('front.master')
@section('title','Category Page')
@section('content')
<main role="main">
	 <div class="album py-5 bg-light">
        <div class="container">
			<?php
			$cate_name=DB::table('categories')->select('name')->where('id',$id_)->get();
			?>
			<h3 class="text-center">Category:
			@foreach($cate_name as $cat_n)
				{{$cat_n->name}}
				@endforeach
			
			</h3>
			
          <div class="row">
			  
			  @foreach($category_products as $product)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{url('/uploads/bu_images',$product->image)}}" alt="Card image cap" width="200px" height="300px">
                <div class="card-body">
					
					<h4 class=" float-right">{{$product->price}}</h4>
					<del>250000</del>
                  <p class="card-text">{{$product->phone}}.</p>
					
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
					 
						<a class="btn btn-sm btn-outline-warning" href="{{url('productDetail',$product->id)}}">View Product</a>
                      	<a href="{{url('cart/addItem',$product->id)}}" class="btn btn-info">Add To Cart</a>
                    </div>
					  
                    <small class="text-muted">min 9</small>
                  </div>
                </div>
              </div>
				   
            </div>
          
			@endforeach 
          
          </div>
        </div>
      </div>

</main>

@endsection