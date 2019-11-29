@extends('front.master')
@section('content')
<div class="about-" id="bu">
 <div class="container" >
    <div class="row">
		
        <div class="col-md-12">
            <div class="card"style="border:10px solid #0bf">
                <div class="card-header"style="background:#0bf">
				
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
			</div>
		</div>
	  </div>
		<div class="row">
		@foreach($bus as $bu)
		@if($bu->email==Auth::user()->email)
		<div class="col-md-12 pull-left"style="
	     margin-bottom:20px">
	<div class="col-md-6 shadow" >
       
          <h2 style="color:#0098d0"><span>{{$bu->bu_price}} LE</span>
			
			  <span style="float:left">{{$bu->bu_small_dis}}</span></h2>

		

		<span class="badge" style="background:#5fccb4">{{ $bu->type['name'] }}</span>
	
		<span class="badge" style="background:#5fccb4">{{ $bu->statu['name'] }}</span>
		
		<h2>{{$bu->user['name']}}</h2>

        <p style="color:#777">{{$bu->bu_large_dis}}</p>
        <a class="btn btn-info" href="{{route('showb',$bu->id)}}"style="background:#0bf">Show</a>
		
		<a class="btn btn-info" href="{{route('buser.edit',$bu->id)}}"style="background:#f70">Edit</a>
		
		<form action="{{route('buser.destroy',$bu->id)}}" method="post" style="float:left">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" value="Delete" class="btn btn-danger">
					</form>
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
