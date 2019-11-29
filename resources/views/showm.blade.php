@extends('front.master')
@section('content')
<script src="https://maps.googleapis.com/maps/api/js"></script>
<div class="about-" id="bu">
 <div class="container" >
    <div class="row">
		
        <div class="col-md-12">
            <div class="card"style="border:10px solid #f70">
                <div class="card-header"style="background:#f70">
				
				<br>
				
				</div>

          <div class="card-body">
			  <div class="col-md-3">
			<h2 style="color:#f70">{{$bu->price}} LE</h2>
			<h1 style="color:#f70;margin-left:-30px">{{$bu->phone}}</h1>
			  </div>
		<div class="card-body" >
      <div class="col-md-9 shadow pull-right"style="float:right">
        
          <h2 style="color:#f70"><span>{{$bu->small_dis}}</span>
			  <h5>{{$bu->created_at}}</h5>
			</h2>
			<img src="{{$bu->image_path}}" height="350px" width="450px">
      <table id="example2" class="table table-bordered table-hover col-md-6">
		  <tr>
			  <th>price</th>
			  <td>{{$bu->price}}</td>
		  </tr>
		  
		  <tr>
			  <th>operation</th>
			  <td>{{$bu->operation['type']}}</td>
		  </tr>
		   <tr>
			  <th>category</th>
			  <td>{{$bu->category['name']}}</td>
		  </tr>
		   <tr>
			  <th>Quantity</th>
			  <td>{{$bu->qty}}</td>
		  </tr>
		   <tr>
			  <th>Stock</th>
			  <td>{{$bu->stock}}</td>
		  </tr>
		  @if($bu->country_id)
		   <tr>
			  <th>Country</th>
			  <td>{{$bu->country->name}}</td>
		  </tr>
		  @endif
        <p>{{$bu->large_dis}}</p>
        
	
     
		  </table>
		  <a href="{{url('cart/addItem',$bu->id)}}" class="btn btn-info"style="background:#0bf">Add To Cart</a>
			<?php
			$wishlistData=DB::table('wishlist')->rightJoin('musers','wishlist.pro_id','=','musers.id')->where('wishlist.pro_id','=',$bu->id)->get();
			$count=App\Wishlist::where(['pro_id'=>$bu->id])->count();
			if($count=='0'){
				?>
			<form action="{{route('addWishlist')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="pro_id" value="{{$bu->id}}">
			<button class="btn btn-warning"style="background:#f70">Add To Wishlist</button>
			</form>
			<?php } else { 
			?>
			<h3>this Moblia already added to wishlist<a href="{{url('/wishlist')}}">Wishlist</a></h3>
			<?php }?>
		  </div>
					</div>
		<div id="googleMap" style="width:500px;height:300px">
				</div>
		  </div>
      </div>
    </div>
 



<br>
<br>
<div class="footer">
  <div class="footer_bottom">
    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
    <div class="copy">
      <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
    </div>
  </div>
</div>
@endsection