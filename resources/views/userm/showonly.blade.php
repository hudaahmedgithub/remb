@extends('front.master')
@section('content')
<div class="about-" id="bu">
 <div class="container" >
    <div class="row">
		
        <div class="col-md-12">
            <div class="card"style="border:10px solid #f70">
                <div class="card-header"style="background:#f70">
				
				<br>
				
				</div>

                <div class="card-body">
		<div class=" col-md-12 float-right">
		
			
		<div class="col-md-1 "></div>
		<div class="row">
			<div class="col-md-3">
				<div class="profile-sidebar">
			<div class="profile-usermenu">
					<ul class="nav">
						
						<li class="active">
							<a href="{{url('/')}}">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						
						<li>
							<a href="{{url('/old')}}">
							<i class="glyphicon glyphicon-user"></i>
							Old</a>
						</li>
						<li>
							<a href="{{url('/new')}}" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							New </a>
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
			</div>
		</div>
	  </div>
		<div class="row">
		@foreach($bus as $bu)
		@if($bu->email==Auth::user()->email)
		<div class="col-md-12 pull-left"style="
	     margin-bottom:20px">
	<div class="col-md-6 shadow" >
       
          <h2 style="color:#f70"><span>{{$bu->price}} LE</span>
			<br>
			  <span style="float:left"></span>{{$bu->small_dis}}</h2>

		

		<span class="badge" style="background:#5fccb4">{{ $bu->category['name'] }}</span>
	
		<span class="badge" style="background:#5fccb4">{{ $bu->operation['type'] }}</span>
		
		<h2>{{$bu->user['name']}}</h2>

        <p style="color:#777">{{$bu->large_dis}}</p>
        <a class="btn btn-info" href="{{route('show',$bu->id)}}"style="background:#0bf">Show</a>
		&nbsp;&nbsp;
		
			
		<form action="{{route('muser.destroy',$bu->id)}}" method="post"style="float:left">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" value="Delete" class="btn btn-danger">
					</form>
	
		<a class="btn btn-info" href="{{route('muser.edit',$bu->id)}}"style="background:#f70;margin-left:-15px">Edit</a>
		
			</div>
		
		<span class="col-md-6" style="float:right;margin-top:-250px">
      <img src="{{$bu->image_path}}" height="250px" width="250px">
        
        </span>
		
		</div>	
<br>
<br><br>
<br><br>

@endif
		@endforeach
</div>
		</div>
	</div>
	  
  
@endsection
