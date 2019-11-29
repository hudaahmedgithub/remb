@extends('front.master')
@section('content')
<div class="about-" id="bu">
  <div class="container">
    <div class="row">
		<div class=" col-md-12 float-right">
		
		<form action="{{url('/')}}" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{request()->search}}" style="color:#f90" >
   <!-- <div class="col-md-3" style="float:right">-->
   
		<select name="bu_rent" class="form-control">
				<option>operation</option>
				@foreach($operations as $operation)
				<option value="{{$operation->id}}"{{ request()->operation_id==$operation->id ? 'selected' : ''}}>{{$operation->type}}</option> 
				@endforeach
			</select> 
			<br>
	<select name="bu_type" class="form-control" >
				<option>Type of order</option>
				@foreach($categories as $cat)
				<option value="{{$cat->id}}"{{ request()->category_id==$cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
				@endforeach
			</select>
			<br>
	<select name="country_id" class="form-control" >
				<option>country name</option>
				@foreach($countries as $count)
				<option value="{{$count->id}}"{{ request()->country_id==$count->id ? 'selected' : ''}}>{{$count->name}}</option>
				@endforeach
			</select>
			<br>
                <button type="submit"  id="search-btn" class="btn btn-primary feature_btn pull-left" ><!--helper function to remain keyword that i search in input field-->
					Search
                </button>
			</div>
		</form>
			
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
							Rent</a>
						</li>
						<li>
							<a href="{{url('/new')}}" target="_blank">
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
		@foreach($musers as $bu)
		@if($bu->email==Auth::user()->email)
		<div class="col-md-12 pull-left"style="
	     border: 10px solid #dff;
         padding: 10px;
         box-shadow: 10px 10px 10px 10px #cff;
	     margin-bottom:20px">
	<div class="col-md-6 shadow" >
       
          <h2 style="color:#0098d0"><span>{{$bu->small_dis}}</span>
			
			  <span style="float:left">{{$bu->price}} LE</span></h2>

		

		<span class="badge" style="background:#5fccb4">{{ $bu->category['name'] }}</span>
	
		<span class="badge" style="background:#5fccb4">{{ $bu->operation['type'] }}</span>
		
		<h2>{{$bu->user['name']}}</h2>

        <p style="color:#777">{{$bu->large_dis}}</p>
        <a class="btn btn-info" href="{{route('show',$bu->id)}}"style="background:#f90">Show</a>
		
		<a class="btn btn-info" href="{{route('muser.edit',$bu->id)}}"style="background:#f90">Edit</a>
		
		<form action="{{route('muser.destroy',$bu->id)}}" method="post">
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
