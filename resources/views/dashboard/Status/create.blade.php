@extends('layouts.dashboard.app')

@section('content')
@include('partials._session')
<section class="content">

 <div class="box box-info">
	 <div class="col-md-2"></div>
		
    <div class="col-md-10">
     <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">@lang('site.status')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('dashboard.status.store')}}" method="post">
				
				{{csrf_field()}}
				{{method_field('post')}}
				
            
					  <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
					</label>

           <div class="col-md-6">
         
			   <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value=""  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
		

                    <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

