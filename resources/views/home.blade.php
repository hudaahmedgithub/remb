@extends('layouts.app')
@section('title')
الرئيسيه
@endsection

@section('content')
 <div class="container" style="margin-top:-160px">
	  
    <div class="banner-info">
		<div class="text-center col-md-12">
			<h1 style="color:#fff;margin-bottom:-150px">اهلا بكم فى موقع عقارات الاول فى الشرق الاوسط</h1>
		</div>
<div class="col-md-3">
	</div>
<div class="col-md-6" style="margin-top:160px">
	
	<form action="{{url('/')}}" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{request()->search}}" style="color:#f90" >
   <!-- <div class="col-md-3" style="float:right">-->
   
		<select name="bu_rent" class="form-control">
				<option ></option>
				@foreach($operations as $operation)
				<option value="{{$operation->id}}"{{ request()->bu_rent==$operation->id ? 'selected' : ''}}>{{$operation->type}}</option> 
				@endforeach
			</select> 
			
	<select name="bu_type" class="form-control" >
				<option>Type of order</option>
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
                <button type="submit"  id="search-btn" class="banner_btn block"style="background:#0098d0;" ><!--helper function to remain keyword that i search in input field-->
					Search
                </button>
			</center>
			</div>
		</form>
</div>
	<div class="col-md-3"></div>

                   <div class="banner text-center">
 
      
      
    </div>
  

<div class="main">
<div class="content_white">
  <h2>Featured Services</h2>
  <p>Quisque cursus metus vitae pharetra auctor, sem massa mattis semat interdum magna.</p>
</div>
<div class="featured_content" id="feature">
  <div class="container">
    <div class="row text-center">
      <div class="col-mg-3 col-xs-3 feature_grid1"> <i class="fa fa-cog fa-3x"></i>
        <h3 class="m_1"><a href="services.html">Legimus graecis</a></h3>
        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>
        <a href="services.html" class="feature_btn">More</a> </div>
      <div class="col-mg-3 col-xs-3 feature_grid1"> <i class="fa fa-comments-o fa-3x"></i>
        <h3 class="m_1"><a href="services.html">Mazim minimum</a></h3>
        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>
        <a href="services.html" class="feature_btn">More</a> </div>
      <div class="col-md-3 col-xs-3 feature_grid1"> <i class="fa fa-globe fa-3x"></i>
        <h3 class="m_1"><a href="services.html">Modus altera</a></h3>
        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>
        <a href="services.html" class="feature_btn">More</a> </div>
      <div class="col-md-3 col-xs-3 feature_grid2"> <i class="fa fa-history fa-3x"></i>
        <h3 class="m_1"><a href="services.html">Melius eligendi</a></h3>
        <p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p>
        <a href="services.html" class="feature_btn">More</a> </div>
    </div>
  </div>
</div>
	
<div class="about-info" id="bu">
  <div class="container">
    <div class="row">
		<div class=" col-md-3 pull-right">
		
		<form action="{{url('/')}}" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{request()->search}}" style="color:#f90" >
   <!-- <div class="col-md-3" style="float:right">-->
   
		<select name="bu_rent" class="form-control">
				<option ></option>
				@foreach($operations as $operation)
				<option value="{{$operation->id}}"{{ request()->bu_rent==$operation->id ? 'selected' : ''}}>{{$operation->type}}</option> 
				@endforeach
			</select> 
			
	<select name="bu_type" class="form-control" >
				<option>Type of order</option>
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
                <button type="submit"  id="search-btn" class="btn btn-primary feature_btn pull-left" ><!--helper function to remain keyword that i search in input field-->
					Search
                </button>
			</div>
		</form>
			<div class="profile-sidebar">
			<div class="profile-usermenu">
					<ul class="nav">
						
						<li class="active">
							<a href="{{url('/')}}">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						
						<li>
							<a href="{{url('/rent')}}">
							<i class="glyphicon glyphicon-user"></i>
							Rent</a>
						</li>
						<li>
							<a href="{{url('/own')}}" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Own </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-1 pull-right"></div>
		@foreach($bus as $bu)
		<div class="col-md-8 pull-left"style="
	     border: 10px solid #dff;
         padding: 10px;
         box-shadow: 10px 10px 10px 10px #cff;
	     margin-bottom:20px">
	<div class="col-md-6 shadow" >
       
          <h2 style="color:#0098d0"><span>{{$bu->bu_small_dis}}</span>
			
			  <span style="float:left;color:#f90">{{$bu->bu_price}} LE</span></h2>
@if($bu->bu_place)
		<div class="badge" style="background:#0098d0">{{$bu->bu_place}}</div>
@endif
		

		<span class="badge" style="background:#0098d0">{{ $bu->category['name'] }}</span>
	
		<span class="badge" style="background:#0098d0">{{ $bu->operation['type'] }}</span>
		
		<h2>{{$bu->user['name']}}</h2>

        <p style="color:#777">{{$bu->bu_large_dis}}</p>
        <a class="banner_btn" href="{{route('show',$bu->id)}}"style="background:#f90">Read More</a> </div>
		<div class="col-md-2" style="float:right;">
      <img src="{{$bu->image_path}}" height="300px" width="250px">
        
        </div>
			<br><br>
		<br><br>
		<br>
		</div>
		
		@endforeach
		
      </div>
	 
	  
	  {{$bus->appends(request()->query())->links() }}
    </div>
  </div>


<div class="highlight-info">
  <div class="overlay spacer">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-3 col-xs-6"> <i class="fa fa-smile-o fa-5x"></i>
          <h4>120+ Happy Clients</h4>
        </div>
        <div class="col-sm-3 col-xs-6"> <i class="fa fa-check-square-o fa-5x"></i>
          <h4>600+ Projects Completed</h4>
        </div>
        <div class="col-sm-3 col-xs-6"> <i class="fa fa-trophy fa-5x"></i>
          <h4>25 Awards Won</h4>
        </div>
        <div class="col-sm-3 col-xs-6"> <i class="fa fa-map-marker fa-5x"></i>
          <h4>3 Offices</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="testimonial-area">
  <div class="testimonial-solid">
    <div class="container">
      <h2>Client Testimonials</h2>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"> <a href="#"></a> </li>
          <li data-target="#carousel-example-generic" data-slide-to="1" class=""> <a href="#"></a> </li>
          <li data-target="#carousel-example-generic" data-slide-to="2" class=""> <a href="#"></a> </li>
          <li data-target="#carousel-example-generic" data-slide-to="3" class=""> <a href="#"></a> </li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
            <p><strong>- John Doe -</strong></p>
          </div>
          <div class="item">
            <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
            <p><strong>- Jane Doe -</strong></p>
          </div>
          <div class="item">
            <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
            <p><strong>- John Smith -</strong></p>
          </div>
          <div class="item">
            <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
            <p><strong>- Linda Smith -</strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                </div>

            </div>
        </div>
   <div class="footer">
  <div class="footer_bottom">
    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
    <div class="copy">
      <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
    </div>
  </div>
</div>
@endsection
