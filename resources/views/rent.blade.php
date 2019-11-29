@extends('front.master')
@section('content')

<div class="about-" id="bu">
 <div class="container" >
    <div class="row">
		@foreach($bus as $bu)
	  <div class="col-md-12">
         <div class="card"style="border:10px solid #0bf">
         <div class="card-header"style="background:#0bf;
         padding: 10px;
         box-shadow: 10px 10px 20px 20px #cff;">
			  <h4 style="color:#fff">{{$bu->type['name']}}</h4>
			 <br>
		</div>
		  </div>
		

	<div class="card-body">
        <div class="row shadow" style="padding: 10px;box-shadow: 10px 10px 20px 20px #cff;">
			
		<div class="col-md-2"></div>
      <div class="col-md-5 shadow">
        <div class="block-heading-two">
          <h2 style="color:#0098d0"><span>{{$bu->bu_price}} LE</span>
			<br>
			  <span style="float:left">{{$bu->bu_small_dis}}</span></h2>
			 <br>
        </div>
		  <br>
        <p>{{$bu->bu_large_dis}}</p>
        <a class="btn btn-info"style="background:#0bf" href="{{route('showb',$bu->id)}}">Read More</a> </div>
		<div class="col-md-1"></div>
		<div class="col-md-3">
         <img src="{{$bu->image_path}}" height="300px" width="250px">
        
        </div>
		
      </div>
    </div>
  </div>
@endforeach
 {{$bus->appends(request()->query())->links() }}
<div class="footer">
  <div class="footer_bottom">
    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
    <div class="copy">
      <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
    </div>
  </div>
</div>
@endsection