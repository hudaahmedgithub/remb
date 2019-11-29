@extends('front.master')
@section('title','Update Password Page')
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
						change your password
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
<form action="{{url('updatePassword')}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	
	<input type="hidden" name="_method" value="put">
  
          <div class="form-group col-md-6">
           <label for="oldPassword" class="form-label">Current Password</label>
              <input id="oldPassword" type="password" name="oldPassword"required 
			placeholder="Old Password" class="form-control">
				 </div>
       <div class="form-group col-md-6">
           <label for="newPassword" class="form-label">New Password</label>
              <input id="newPassword" type="password" name="newPassword"required 
			placeholder="New Password" class="form-control">
			  </div>
		
		
            <input type="submit" value="Update" class="btn btn-primary btn-sm">
			</form>
                               
                              
		</div>
            	
		</div>
	</div>
	</div>
</section>

@endsection