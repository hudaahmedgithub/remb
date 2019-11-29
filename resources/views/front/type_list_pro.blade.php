@extends('front.master')
@section('title','Type Page')
@section('content')
<main role="main">
	 <div class="album py-5 bg-light">
        <div class="container">
			<?php
			$cate_name=DB::table('types')->select('name')->where('id',$id_)->get();
			?>
			<h3 class="text-center">Type:
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
					
					<h4 class=" float-right">{{$product->bu_price}}  LE</h4>
					
                  <p class="card-text">{{$product->bu_small_dis}}.</p>
					
				  <p class="card-text">{{$product->country->name}}</p>
					
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
					 
						<a class="btn btn-sm btn-outline-warning" href="{{route('showb',$product->id)}}">View</a>
                      	
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