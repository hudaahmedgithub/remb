@extends('layouts.dashboard.app')
@section('content')
<br><br>
<div class="container"style="background:#fff">
    <div class="row justify-content-center">
		<div class="col-md-3"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form  action="{{route('dashboard.mu.update',$bu->id)}}" method="POST" enctype="multipart/form-data" >
					
				{{csrf_field()}}
					{{ method_field('put') }}
						<div class="form-group row">
						<label>Status</label>
						
				<select name="rent" class="form-control col-md-12">
							
				@foreach($operations as $operation)
						<option value="{{$operation->id}}"@if($operation->id === $bu->operation_id) selected @endif>
								{{$operation->type}}
								</option>
								@endforeach
							</select>
							</div>
							<div class="form-group row">
						<label>Country</label>
						
				<select name="country" class="form-control col-md-12">
						@foreach($countries as $operation)
						<option value="{{$operation->id}}"@if($operation->id === $bu->country_id) selected @endif>
								{{$operation->name}}
								</option>
								@endforeach
							</select>
							</div>
						
						<div class="form-group row">
							<label>price</label>
							<input class="form-control" name="price" value="{{$bu->price}}">
							</div>
					
						
						<div class="form-group row">
						<label>Category</label>
						
							<select name="type" class="form-control col-md-12">
						@foreach($categories as $cat)
						<option value="{{$cat->id}}" @if($cat->id === $bu->category_id) selected @endif>
								{{$cat->name}}
								</option>
								@endforeach
							</select>
							</div>
						
				
							<div class="form-group row">
							<label>small description</label>
							<input class="form-control" name="small_desc" value="{{$bu->small_dis}}">
							</div>
						
						
							<div class="form-group row">
							<label>large description</label>
								<textarea name="large_desc" class="form-group col-md-12" cols="20" rows="10">{{$bu->large_dis}}</textarea>
							</div>
					
						
						<div class="form-group row">
							<label>image</label>
							<input class="image form-control" name="image" id="image" type="file">
						
							</div>
						 <div class="form-group">
                            <img src="{{$bu->image_path}}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>
						
						<div class="form-group row">
							<label>Stock</label>
							<input class="form-control" name="stock"value="{{$bu->stock}}">
							</div>
						
						<div class="form-group row">
							<label>Qty</label>
							<input class="form-control" name="qty"value="{{$bu->qty}}">
							</div>
						<h2>data about user</h2>
							
						
						<div class="form-group row">
							<label>name</label>
							<input class="form-control" name="name"value="{{$bu->name}}">
							</div>
						
						
						<div class="form-group row">
							<label>phone</label>
							<input class="form-control" name="phone" type="text"value="{{$bu->phone}}">
							</div>
						
						<div class="form-group row">
							<label>Email</label>
							<input class="form-control" name="email" value="{{$bu->email}}">
							</div>
					<div class="form-group row">
							
							<input class="form-control btn btn-warning" type="submit" value="update">
							</div>	
						@endsection