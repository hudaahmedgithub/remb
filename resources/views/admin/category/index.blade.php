@extends('admin/master')    
@section('title','Show Categories')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<br>
	<br>
	<br>
	<h1>Categories</h1>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
				
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>
					<form action="{{route('category.destroy',$category->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" value="Delete" class="btn btn-danger">
					</form>
						</td>
				</tr>
				@endforeach
			</tbody>
			
		</table>
	</div>
	
	<br>
	<br>
	<br>
	<h1>Add Product</h1>
	<form action="{{route('category.store')}}" method="post">
		{{csrf_field()}}
	<div class="panel-body col-md-8">
		
		<div class="form-group">
        <label for="name">Name</label>
		<input type="text" name="name" class="form-control">
		</div>
		<input type="submit" class="btn btn-info" value="Add Category">
		</div></form>
</main>


@endsection
