@extends('front.master')
@section('title','Address Page')
@section('content')
<style>
	table td {
		padding: 20px;
	}
</style>
<section id="cart_items">
	<div class="container">
		<br>
		<div class="row">
		<div class="col-md-4 well well-sm">
			<div class="card text-dark bg-light  mb-3" style="max-width: 18rem;">
        <div class="card-header ">Profile Menu</div>
        <div class="card-body ">
  @include('profile.menu')
  </div>
</div>
		
		</div>
			<div class="col-md-8 ">
			<h3><span style="color:#f90"> {{ucwords(Auth::user()->name)}}
						change your address
			</span></h3>
				
		<div class="container">
			 @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        @if(session('error'))

                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
<form action="{{url('updateAddress')}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_token" value="{{csrf_token()}}">
       @foreach($address as $add)
          <div class="form-group col-md-6">
           <label for="fullname" class="form-label">Full Name</label>
              <input id="fulltname" type="text" name="fullname"required 
			value="{{ $add->fullname}}" class="form-control">
				 </div>
       <div class="form-group col-md-6">
           <label for="city" class="form-label">City</label>
              <input id="city" type="text" name="city"required 
			value="{{ $add->city}}" class="form-control">
			  </div>
			  
			  <div class="form-group col-md-6">
           <label for="fullname" class="form-label">State</label>
              <input id="state" type="text" name="state"required 
			value="{{ $add->state}}" class="form-control">
			  </div>
				 
		 <div class="form-group col-md-6">
           <label for="pincode" class="form-label">pincode</label>
              <input id="pincode" type="text" name="pincode"required 
			value="{{ $add->pincode}}" class="form-control">
			  </div>
				 
		 <div class="form-group col-md-6">
           <label for="country" class="form-label">country</label>
              <input id="country" type="text" name="country"required 
			value="{{ $add->country}}" class="form-control">
			  </div>
				 	 
				 @endforeach
            <input type="submit" value="Update" class="btn btn-primary btn-sm">
			</form>
                               
                              
		</div>
            	
		</div>
	</div>
	</div>
</section>

@endsection