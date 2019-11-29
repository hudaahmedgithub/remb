@extends('layouts.dashboard.app')

@section('content')
<section class="content">

 <div class="box box-info">
	 <div class="col-md-2"></div>
		
    <div class="col-md-10">
     <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">@lang('site.clients')</h3>
            </div>
          
            <form  action="{{route('dashboard.clients.update',$client->id)}}" method="post" >
				{{csrf_field()}}
				{{method_field('put')}}
              	<div class="form-group">
					<label>@lang('site.name')</label>
					<input class="form-control" value="{{$client->name}}" type="text" name="name">
				</div>
				
				@for($i=0 ;$i < 2;$i++)
          
					<div class="form-group">
					<label>@lang('site.phone')</label>
					<input class="form-control" value="{{$client->phone[$i] ?? ''}}" type="tel" name="phone[]">
				</div>
		 @endfor
          
					
          
	<div class="form-group">
					<label>@lang('site.address')</label>
					<input class="form-control" value="{{$client->address}}" type="text" name="address">
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

