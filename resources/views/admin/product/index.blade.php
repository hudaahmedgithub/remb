@extends('admin/master')    
@section('title','List Product')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<br>
	<br>
	<br>
	<h1>Products</h1>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td><img src="{{url('dist/images',$product->image)}}" width="100px" height="50px"></td>
					<td>{{$product->pro_name}}</td>
					<td>$ {{$product->pro_price}}</td>
					<td>
					<form action="{{route('product.destroy',$product->id)}}" method="post">
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
</main>
@endsection