@extends('layouts.dashboard.app')

@section('content')
<section class="content">

 <div class="box box-info">
	 <div class="col-md-2"></div>
		
    <div class="col-md-10">
     <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">@lang('site.categories')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form  action="{{route('dashboard.categories.update',$category->id)}}" method="post" >
				{{csrf_field()}}
				{{method_field('put')}}
              <div class="box-body">
	      
					  <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
					</label>

           <div class="col-md-6">
         
			   <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category->name }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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

