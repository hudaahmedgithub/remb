@extends('layouts.app')
@section('content')
<section id="cart_items">
	<div class="container">
		<br>
		<div class="row">
		<div class="col-md-4 well well-sm">
			<div class="card text-dark bg-light  mb-3" style="max-width: 18rem;">
        <div class="card-header ">Profile Menu</div>
        <div class="card-body ">
 
  </div>
</div>
		
		</div>
			<div class="col-md-12">
			<center>
			<h3><span style="color:#f90"> {{ucwords(Auth::user()->name)}}
						change your data
			</span></h3>
				</center>	
		<div class="container" >
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
			
<form action="{{url('/buser/updateprofile')}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row">
         
	  <div class="form-group col-md-6">
           <label for="fullname" class="form-label ">Email</label>
              <input id="email" type="email" name="email"required 
			value="{{ $data->email}}" class="form-control">
				 </div>
	</div>
	<div class="row">
       <div class="form-group col-md-6">
           <label for="city" class="form-label">Password</label>
              <input id="password" type="password" name="password"required 
		 class="form-control">
	</div>
	</div>
            <input type="submit" value="Update" class="block btn btn-info btn-sm col-md-6">

			</form>
                               
                              
		</div>
				</div>
            	
		</div>
	</div>
</section>

@endsection