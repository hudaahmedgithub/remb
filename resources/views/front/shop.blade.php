@extends('front.master')
@section('title','Shop Page')
@section('content')
<main role="main">
	<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
	
	   <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
			  @foreach($products as $product)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{url('uploads/bu_images',$product->image)}}" alt="Card image cap" width="260px" height="300px">
                <div class="card-body">
					
					<h4 class=" float-right">{{$product->pro_price}}</h4>
					<del>{{$product->sp1_price}}</del>
                  <p class="card-text">{{$product->pro_name}}.</p>
					
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