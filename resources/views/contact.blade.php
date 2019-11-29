@extends('front.master')
@section('title')
contact
@endsection
@section('content')
@if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
	            <button type="button" class="close" data-dismiss="alert">×</button>	
                   <strong>{!! session('flash_message_error')!!}</strong>
            </div>
            
            @endif
          @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
	            <button type="button" class="close" data-dismiss="alert">×</button>	
                   <strong>{!! session('flash_message_success')!!}</strong>
            </div>
            @endif
<form action="{{url('/contact')}}" method="post" class="row ">
	{{ csrf_field() }}
	<div class="col-md-3"></div>
	<div class="col-md-6" style="background:#ddf;border:10px solid #0bf;padding-top:30px ">
				    <div class="form-group col-md-12">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
                            
                            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="subject">
				            </div>
                            
				            
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input style="background-color: #0bf" type="submit" name="submit" class="btn btn-primary pull-right" value="Send Contact">
				            </div>
	</div> 
	<div class="col-md-3"></div>
</form>
<div class="footer">
  <div class="footer_bottom">
    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
    <div class="copy">
      <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
    </div>
  </div>
</div>

@endsection