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
                    <form method="POST" action="{{route('adminPanel.bu.store')}}" aria-label="{{ __('Add ') }}" >
					
				{{csrf_field()}}
				{{method_field('post')}}
						<div class="form-group">
							<label>name</label>
							<input class="form-control" name="name">
							</div>
						
						<div class="form-group">
							<label>price</label>
							<input class="form-control" name="price">
							</div>
						
						<div class="form-group">
							<label>rent</label>
							<input class="form-control" name="rent">
							</div>
						
						<div class="form-group">
							<label>square</label>
							<input class="form-control" name="square">
							</div>
						
						<div class="form-group">
							<label>type</label>
							<input class="form-control" name="type">
							</div>
						
							<div class="form-group">
							<label>small description</label>
							<input class="form-control" name="small_desc">
							</div>
						
							<div class="form-group">
							<label>meta</label>
							<input class="form-control" name="meta">
							</div>
						
							<div class="form-group">
							<label>large description</label>
							<input class="form-control" name="large_desc">
							</div>
					
						<div class="form-group">
							<label>bu_langtuide</label>
							<input class="form-control" name="bu_langtuide">
							</div>
						
							<div class="form-group">
							<label>bu_latituide</label>
							<input class="form-control" name="bu_latituide">
							</div>
					<div class="form-group">
							
							<input class="form-control btn btn-info" type="submit" value="save">
							</div>	
						