@extends('front.master')
@section('title','Home Page')
@section('content')
 <main role="main">
	
	  <div class="banner-info">
		<div class="text-center col-md-12">
			<h1 style="color:#fff;margin-bottom:-150px">اهلا بكم فى موقع عقارات الاول فى الشرق الاوسط</h1>
		</div>
<div class="row">
	<div class="col-md-2"></div>

	<div class="col-md-8" style="margin-top:160px">
	
	<form action="{{url('/')}}" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="price" value="{{request()->search}}" style="color:#f90" >
   <!-- <div class="col-md-3" style="float:right">-->
   
		<select name="bu_rent" class="form-control">
				<option >Operation of order</option>
				@foreach($operations as $operation)
				<option value="{{$operation->id}}"{{ request()->bu_rent==$operation->id ? 'selected' : ''}}>{{$operation->name}}</option> 
				@endforeach
			</select> 
			
	<select name="bu_type" class="form-control" >
				<option>category of order</option>
				@foreach($categories as $cat)
				<option value="{{$cat->id}}"{{ request()->bu_type==$cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
				@endforeach
			</select>
<select name="country_id" class="form-control" >
				<option>country name</option>
				@foreach($countries as $count)
				<option value="{{$count->id}}"{{ request()->country_id==$count->id ? 'selected' : ''}}>{{$count->name}}</option>
				@endforeach
			</select>
			<center>
                <button type="submit"  id="search-btn" class="btn btn-info block"style="background:#0bf;" ><!--helper function to remain keyword that i search in input field-->
					Search
                </button>
			</center>
			</div>
		</form>
</div>

<div class="col-md-2"></div>
	

    </div>
		  
  
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
	  
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('uploads/bu_images/BhnjjwfB3UAToNiELglFSeihUns0uZobJeu6dtP8.jpeg')}}" width="100%"height="470px" alt="First slide">
		
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('uploads/bu_images/title-bg.jpg')}}" width="100%"height="470px"  alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('uploads/bu_images/images.jpg')}}"width="100%"height="470px" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	 </div>
      <div class="album py-5 bg-light">
        <div class="container">
  
  <div class="row">

    @foreach($products as $product)
            <div class="col-md-4  shadow" style="border:10px solid #cff">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="uploads/bu_images/{{$product->image}}" alt="Card image cap" width="200px" height="300px">
                <div class="card-body">
					
					<h4 class=" float-right">{{$product->price}}</h4>
					<del>{{$product->price}}</del>
                  <p class="card-text">{{$product->small_dis}}.</p>
					
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
						
                      <a class="btn btn-sm btn-outline-info" href="{{url('productDetail',$product->id)}}">View Product</a>
                     
						<a href="{{url('cart/addItem',$product->id)}}" class="btn btn-info" style="background:#f70">Add To Cart</a>
                    </div>
					  
                    <small class="text-muted">stock 
						{{$product->stock}}</small>
                  </div>
                </div>
              </div>
				   
            </div>
          
			@endforeach 
          
          </div>
			
			<div class="row">
			  @foreach($bus as $bu)
            <div class="col-md-4 shadow" style="border:10px solid #cff">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{$bu->image_path}}" alt="Card image cap" width="200px" height="300px">
                <div class="card-body">
					
					<h4 class=" float-right">{{$bu->bu_price}}</h4>
					<p>{{$bu->country['name']}}</p>
                  <p class="card-text">{{$bu->bu_small_dis}}.</p>
					
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
					
						<a href="{{route('showb',$bu->id)}}" class="btn btn-info" style="background:#0bf">View Estate</a>
                    </div>
					  
                    <small class="text-muted">{{$bu->statu['name']}}</small>
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