<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="uploads/bu_user/{{Auth::user()->image}}" class="img-circle" >
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            
			<li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-th"><span>@lang('site.dashboard')</span></i>
				</a>
			</li>
		@if(auth()->user()->hasPermission('read_users'))	
			<li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-th"><span>@lang('site.users')</span></i>
				</a>
			</li>
			@endif
			
@if(auth()->user()->hasPermission('read_categories'))	
			<li><a href="{{route('dashboard.categories.index')}}"><i class="fa fa-th"><span>@lang('site.categories')</span></i>
				</a>
			</li>
			@endif
		
		@if(auth()->user()->hasPermission('read_bus'))	
			<li><a href="{{route('dashboard.bu.index')}}"><i class="fa fa-th"><span>@lang('site.bus')</span></i>
				</a>
			</li>
			@endif
		
		@if(auth()->user()->hasPermission('read_musers'))	
			<li><a href="{{route('dashboard.mu.index')}}"><i class="fa fa-th"><span>@lang('site.musers')</span></i>
				</a>
			</li>
			@endif	
			@if(auth()->user()->hasPermission('read_operations'))	
			<li><a href="{{route('dashboard.operation.index')}}"><i class="fa fa-th"><span>@lang('site.operation')</span></i>
				</a>
			</li>
			@endif
		
			@if(auth()->user()->hasPermission('read_types'))	
			<li><a href="{{route('dashboard.types.index')}}"><i class="fa fa-th"><span>@lang('site.types')</span></i>
				</a>
			</li>
			@endif
			
		@if(auth()->user()->hasPermission('read_status'))	
			<li><a href="{{route('dashboard.status.index')}}"><i class="fa fa-th"><span>@lang('site.status')</span></i>
				</a>
			</li>
			@endif
		</ul>
    </section>

</aside>

