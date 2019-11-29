@extends('layouts.dashboard.app')

<head>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

@section('content')
<body class="hold-transition skin-blue sidebar-mini">
	
	<section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href=""><i class=" active fa fa-dashboard"></i>الرئيسيه</a></li>
        <li><a class="active" href="{{url('/bu')}}">التحكم فى العقارات</a></li>
        
      </ol>
    </section>
 <div class="box-body">
	  <section class="content">
      <div class="row">
      <div class="col-md-2"></div>
          <div class="box col-md-10">
			  	
								@if (auth()->user()->hasPermission('create_bus'))
                                    <a href="{{ route('dashboard.bu.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-info disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
              <table id="example2" class="table table-bordered table-hover">
				
                <thead>
                <tr>
                 <td>id</td>
                 <td>price</td>
                 <td>Type</td>
				 <td>Status</td>
				<td>Country</td>
                 <td>small description</td>
				 <td>large description</td>
				 <td>Image</td>
                  <th>Action</th>
                </tr>
                </thead>
				    @foreach($bus as $bu)
                <tbody>
                <tr>
                  <td>{{$bu->id}}</td>
					<td>{{$bu->bu_price}}
                  </td>
					 <td>{{$bu->type->name}}</td>
                  <td>{{$bu->statu->name}}</td>
					
                  <td>{{$bu->country->name}}</td>
					
                  <td>{{$bu->bu_small_dis}}</td>
				 <td>{{$bu->bu_large_dis}}</td>
                 
					<td><img src="{{$bu->image_path}}" height="300px" width="250px"></td>
					
                  <td>
                  @if (auth()->user()->hasPermission('update_bus'))
					 <a href="{{url('/dashboard/bu/'.$bu->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                         @else
                      
						 <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
						 
					 @endif
					 </td>
					<td>
                        @if (auth()->user()->hasPermission('delete_bus'))
                       <form action="{{ route('dashboard.bu.destroy', $bu->id) }}" method="post" style="display: inline-block">
                             {{ csrf_field() }}
                             {{ method_field('delete') }}
                          <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                       <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
					</td>
					
                </tr>
                
				  </tbody>
				  @endforeach
              </table>
            </div>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
		  </div></section></div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>

@endsection
