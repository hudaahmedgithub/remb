@extends('front.master')
@section('content')
<style>
.form-group
	{
		color:#07f
	}

</style>
<div class="container">
    <div class="row justify-content-center">
		
        <div class="col-md-12">
            <div class="card" style="border:10px solid #0bf">
                <div class="card-header" style="background:#0bf">
				<br>
				</div>

                <div class="card-body">
                    <form action="{{route('buser.store')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group row">
						<label>Status</label>
						
							<select name="rent" class="form-control col-md-12"required>
								<option ></option>
								@foreach($operations as $opertaion)
						<option value="{{$opertaion->id}}">
								{{$opertaion->name}}
								</option>
								@endforeach
							</select>
							</div>
					
						<div class="form-group row">
							<label>price</label>
							<input class="form-control" name="price"required>
							</div>
					
						
						<div class="form-group row">
							<label>square</label>
							<input class="form-control" name="square" required>
							</div>
						
						<div class="form-group row">
						<label>Type</label>
						
							<select name="type" class="form-control col-md-12" required>
								<option ></option>
								@foreach($categories as $cat)
						<option value="{{$cat->id}}">
								{{$cat->name}}
								</option>
								@endforeach
							</select>
						</div>
						<div class="form-group row">
						<label>country</label>
						
							<select name="country_id" class="form-control col-md-12" required>
								<option ></option>
								@foreach($countries as $cat)
						<option value="{{$cat->id}}">
								{{$cat->name}}
								</option>
								@endforeach
							</select>
						</div>
	
		<div class="form-group row">
							<label>small description</label>
							<input class="form-control" name="small_desc" required>
							</div>
						
						
							<div class="form-group row">
							<label>large description</label>
								<textarea name="large_desc" class="form-group col-md-12" cols="20" rows="10" required></textarea>
							</div>
					
						
						
					<div class="form-group row">
							<label>image</label>
							<input class="image form-control" name="image" id="image" type="file" required>
						
							</div>
						 <div class="form-group">
                            <img src="{{ asset('uploads/bu_images/default.png') }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>
					
						<div class="form-group row">
							<label>floor</label>
							<input class="form-control" name="bu_floor" required>
							</div>
						
						<h2>data about user</h2>
							
						
						<div class="form-group row">
							<label>name</label>
							<input class="form-control" name="name"required>
							</div>
						
						
						<div class="form-group row">
							<label>phone</label>
							<input class="form-control" name="phone" type="text" required>
							</div>
						
						<div class="form-group row">
							<label>Email</label>
							<input class="form-control" name="email" required>
							</div> 

						<div class="form-group row">
							
<input class="form-control btn btn-warning" style="background:#0bf" type="submit" value="Publish">
							</div>	
						<br><br><br>
					</form></div></div></div></div></div>
	<!--<script>

$('#country_id').change(function(){
        var cid = $(this).val();
        if(cid){
        $.ajax({
           type:"get",
           url:" url('/buser') /"+cid, **//Please see the note at the end of the post**
           success:function(res)
           {       
                if(res)
                {
                    $("#state").empty();
                    $("#city").empty();
                    $("#state").append('<option>Select State</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    })
	;
</script>-->				

						@endsection