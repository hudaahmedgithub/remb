
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        
   
	<li class=" active treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>الاعضاء</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('/adminPanel/user/create')}}"><i class="fa fa-circle-o"></i>اضف عضو</a></li>
            <li><a href="{{url('/adminPanel/user')}}"><i class="fa fa-circle-o"></i>كل الاعضاء</a></li>
          </ul>
        </li>
      