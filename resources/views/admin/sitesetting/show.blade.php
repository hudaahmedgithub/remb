@extends('admin.layouts.layout')

@section('title')
 تعديل الموقع
@endsection


@section('content')
<body class="hold-transition skin-blue sidebar-mini">
	 <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
	<section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="{{url('/adminPanel')}}"><i class=" active fa fa-dashboard"></i>الرئيسيه</a></li>
        <li><a class="active" href="{{url('/adminPanel/user')}}">التحكم فى الاعضاء</a></li>
        
      </ol>
    </section>
 <div class="box-body">
	  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
				{{test()}}
            </div>
             <form>
				  @foreach($sites as $user)
				 <div class="form-group row">
					 <div class="col-md-3 pull-right">
				 <label for="value">{{$user->slug}}</label>
					 </div>
					 <div class="col-md-9">
             <input type="text" class="form-control" value="{{$user->value}}" name="value">
				 </div>
				</div>
				 @endforeach
					 
				 	 <input type="submit" value="submit" class="btn btn-warning">
					  
			  </form>
  
  <div class="control-sidebar-bg"></div>
</div>
		  </div></div></section>
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