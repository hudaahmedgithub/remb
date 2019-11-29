@extends('admin/master')    
@section('title','Add Product')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="border:10px solid #ccc">
	<br>
	<br>
	<br>
	<h1>Add Product</h1>
	<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
	<div class="panel-body col-md-8">
		
		<div class="form-group">
        <label for="pro_name">Name</label>
		<input type="text" name="pro_name" class="form-control">
		</div>
		

		<div class="form-group">
		<label for="pro_info">Info</label>
		<input type="text" name="pro_info"  class="form-control">
		</div>

		<div class="form-group">
		<label for="pro_code">Code</label>
		<input type="text" name="pro_code"  class="form-control">
		</div>
		
		<div class="form-group">
		<label for="stock">stock</label>
		<input type="text" name="stock"  class="form-control">
		</div>
		
		<div class="form-group">
		<label for="category_id">Category Name</label>
		<select name="category_id" class="form-control">
			<option value="">--Select One--</option>
			@foreach($categories as $id=>$category)
				<option value="{{$id}}">{{$category}}</option>
			@endforeach
			</select>
		</div>
		
       <div class="form-group">
		<label for="image">Image</label>
		<input type="file" name="image"  class="form-control">
		</div>
		   
		<div class="form-group">
		<label for="sp1_price">Sale price</label>
		<input type="integer" name="sp1_price"  class="form-control">
		</div>
		<div class="form-group">
         <label for="pro_price">Price</label>
		<input type="float" name="pro_price"  class="form-control">
		</div>
		</div>
		<input type="submit" class="btn btn-info" value="Add Product">
	</form>
</main>	
	@endsection