@extends('layouts.dashboard.app')

@section('content')
<section class="content">

 <div class="box box-info">
	 <div class="col-md-2"></div>
		
    <div class="col-md-10">
     <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">@lang('site.users')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form  action="{{route('dashboard.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				{{method_field('put')}}
              <div class="box-body">
	  <div class="form-group row">
		 
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('site.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                  </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@lang('site.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{$user->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('site.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('site.password_confirmed')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>
				    <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">@lang('site.image')</label>
                       <div class="col-md-6">
                           
                            <input type="file" name="image" class="form-control image">
                        </div>
				  </div>
                        <div class="form-group">
                            <img src="{{ $user->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.permission')</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['users', 'categories', 'bus', 'musers','operations','types','status'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                {{--create_users--}}
                                                <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission($map . '_' . $model) ? 'checked' : '' }} value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->

                            </div><!-- end of nav tabs -->

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

