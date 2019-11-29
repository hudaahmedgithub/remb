@extends('layouts.dashboard.app')

@section('content')
@section('content')
<body class="hold-transition skin-blue sidebar-mini">
	 <form action="{{route('dashboard.clients.index')}}" method="get">
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
        <li><a href="{{url('dashboard/welcome')}}"><i class=" active fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
        <li><a class="active" href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
        
      </ol>
    </section>
 <div class="box-body">
	  <section class="content">
      <div class="row">
		  <div class="col-md-2"></div>
        <div class="col-xs-10">
          <div class="box">
            <div class="box-header">
				<h3 class="box-title">@lang('site.client')  <small>   </small></h3>
				<form action="{{route('dashboard.clients.index')}}" method="get">
					<div class="row">
					<input type="search" class="col-md-4 form-control" placeholder="@lang('site.search')" name="search" value="{{request()->search}}" >
						
						<button type="submit" class="form-control col-md-1 btn btn-info"><i class="fa fa-search">@lang('site.search')</i></button>
						@if(auth()->user()->hasPermission('create_clients'))
						<a href="{{route('dashboard.clients.create')}}" class="btn btn-warning">
							<i class="fa 
									  fa-plus"> @lang('site.add')</i>
						</a>
						
						@else
						<a href="{{route('dashboard.clients.create')}}" class="btn btn-warning disabled">
							<i class="fa 
						  fa-plus">
								@lang('site.add')</i>
						</a>
						@endif
					</div>
					
				</form>
            </div>
              <table id="example2" class="table table-bordered table-hover">
				  @if($clients->count()>0)
				  @foreach($clients as $key=>$client)
                <thead>
                <tr>
					
                  <th>Id</th>
					<th><center>@lang('site.name')</center></th>
					
					<th><center>@lang('site.phone')</center></th>
					
					<th><center>@lang('site.address')</center></th>
		
					
					<th><center>@lang('site.action')</center></th>
				
                </tr>
                </thead>
                <tbody>
                <tr>
					<td><center>{{$key+1}}</center></td>
					<td><center>{{$client->name}}</center>
                  </td>
					<td><center>{{  implode(array_filter($client->phone), '-')}}</center>
                  </td>
					<td><center>{{$client->address}}</center>
                  </td>
					<td><center><a href="{{route('dashboard.products.index',['client_id'=>$client->id])}}" class="btn btn-info">@lang('site.related_products')</a></center></td>
		
                  <td>
					 @if(auth()->user()->hasPermission('update_clients'))
					  <a class="active btn btn-info" href="{{route('dashboard.clients.edit',$client->id)}}"><i class="fa 
						  fa-edit">@lang('site.edit')</i></a>
					   @else
					  <button class="btn btn-info disabled"><i class="fa 
						  fa-edit">@lang('site.update')</i></button>
					@endif
					  
					  
					  @if(auth()->user()->hasPermission('delete_clients'))
					  <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="post" style="display: inline-block">
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
                      {{ $clients->appends(request()->query())->links() }}
                          
                    
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->
		  </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
