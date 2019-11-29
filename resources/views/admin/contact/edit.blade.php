@extends('admin.layouts.layout')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-3"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form  action="{{url('/adminPanel/contact')}}">
					
				{{csrf_field()}}
				
						
						<div class="form-group row">
						
						<div class="form-group row">
							<label>name</label>
							<input class="form-control" name="name"value="{{$contact->name}}">
							</div>
						
					<div class="form-group row">
							<label>Email</label>
							<input class="form-control" name="email" value="{{$contact->email}}">
							</div>
							<label>Subject</label>
							<input class="form-control" name="subject"value="{{$contact->subject}}">
							</div>
							<div class="form-group row">
							<label>Message</label>
								<textarea class="form-control" name="message">{{$contact->message}}</textarea>
							</div>
						
						
					<div class="form-group row">
							
							<input class="form-control btn btn-warning" type="submit" value="Back">
							</div>	
						@endsection