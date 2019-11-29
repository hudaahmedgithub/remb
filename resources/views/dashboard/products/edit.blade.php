@extends('layouts.dashboard.app')

@section('content')
<section class="content">

 <div class="box box-info">
	 <div class="col-md-2"></div>
		
    <div class="col-md-10">
     <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">@lang('site.edit')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form  action="{{route('dashboard.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				{{method_field('put')}}
              <div class="box-body">
				  
			<div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
				  
				  
	       @foreach(config('translatable.locales') as $locale)
					  <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
					@lang('site.' . $locale . '.name')</label>

           <div class="col-md-6">
         
			   <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="{{$locale}}[name]" value="{!! $product->translate($locale)->name !!}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
				  			  <div class="form-group">
                                <label>@lang('site.' . $locale . '.description')</label>
                                <textarea name="{{ $locale }}[description]" class="form-control ckeditor">{{ $product->description }}</textarea>
                            </div>
				@endforeach
				</div>
                               <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{$product->image_path}}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.purchase_price')</label>
                            <input type="number" name="purchase_price" step="0.01" class="form-control" value="{{ $product->purchase_price }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.sale_price')</label>
                            <input type="number" name="sale_price" step="0.01" class="form-control" value="{{ $product->sale_price }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.stock')</label>
                            <input type="number" name="stock" class="form-control" value="{{$product->stock }}">
                        </div>    
				<div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>
			
                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->
	
        </section><!-- end of content -->
	</div>
    <!-- end of content wrapper -->

@endsection

