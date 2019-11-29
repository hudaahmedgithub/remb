@extends('layouts.dashboard.app')

@section('content')
@section('content')
<body class="hold-transition skin-blue sidebar-mini">
	 <form action="{{route('dashboard.users.index')}}" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search..." value="{{request()->search}}" style="color:#f90" >
          <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search" ></i><!--helper function to remain keyword that i search in input field-->
                </button>
              </span>
        </div>
      </form>
	<section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href=""><i class=" active fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
        <li><a class="active" href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
        
      </ol>
    </section>
 <div class="box-body">
	  <section class="content">
      <div class="row">
		  <div class="col-md-2"></div>
        <div class="col-xs-10">
          <div class="box">
            <div class="box-header">
				<h3 class="box-title">@lang('site.users')  <small>   {{$users->total()}}</small></h3>
				<form action="{{route('dashboard.users.index')}}" method="get">
					<div class="row">
					<input type="search" class="col-md-4 form-control" placeholder="@lang('site.search')" name="search" value="{{request()->search}}" >
						
						<button type="submit" class="form-control col-md-1 btn btn-info"><i class="fa fa-search">@lang('site.search')</i></button>
						 @if(auth()->user()->hasPermission('create_users'))
						<a href="{{route('dashboard.users.create')}}" class="btn btn-warning">
							<i class="fa 
									  fa-plus"> @lang('site.add')</i>
						</a>
						
					@else
						<a href="{{route('dashboard.users.create')}}" class="btn btn-warning disabled">
							<i class="fa 
						  fa-plus">
								@lang('site.add')</i>
						</a>
						@endif
					</div>
					
				</form>
            </div>
              <table id="example2" class="table table-bordered table-hover">
				  @if($users->count()>0)
				  @foreach($users as $key=>$user)
                <thead>
                <tr>
					
                  <th>Id</th>
					<th><center>@lang('site.name')</center></th>
					<th><center>@lang('site.email')</center></th>
					<th><center>@lang('site.image')</center></th>
					
					<th><center>@lang('site.action')</center></th>
				
                </tr>
                </thead>
                <tbody>
                <tr>
					<td><center>{{$key+1}}</center></td>
					<td><center>{{$user->name}}</center>
                  </td>
					
					<td>{{$user->email}}</td>
                  <td><img src="{{$user->image_path}}" width="200px" height="200px"></td>
                  <td>
					 @if(auth()->user()->hasPermission('update_users'))
					  <a class="active btn btn-info" href="{{route('dashboard.users.edit',$user->id)}}"><i class="fa 
						  fa-edit">@lang('site.edit')</i></a>
					   @else
					  <button class="btn btn-info disabled"><i class="fa 
						  fa-edit">@lang('site.update')</i></button>
					@endif
					  
					  
					  @if(auth()->user()->hasPermission('delete_users'))
					  <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        {{ $users->appends(request()->query())->links() }}
               
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->
		  </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
