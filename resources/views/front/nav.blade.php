<style>
.nav-link
	{
		font-size:16px;
	}

</style>
<nav class="navbar navbar-expand-lg navbar-light" >
  
	<a class="navbar-brand" href="{{url('/')}}"><h1 style="font-family:Curlz MT; color:#f70; font-weight:bold"><span style="color:#0bf">RE</span><span style="color:#f70">MB</span></h1></a>
  
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " style="color:#2abb9b" id="navbarSupportedContent"  style="color:#2abb9b">
	  <div class="color" style="color:#2abb9b">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color:#228899"href="{{route('home')}}">Home <span class="sr-only"style="color:#228899">(current)</span></a>
      </li>
        @guest
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}"style="color:#228899">Sign In </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"style="color:#228899">Sign Up </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#228899" >
                                    {{ Auth::user()->name }} <span class="caret"style="color:#228899"></span>
                                
                           </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
									<a href="{{url('/userShowBu')}}"class="nav-link">  Real Estate</a>
                                     <a href="{{url('/userShowMu')}}"class="nav-link">    Moblia</a>
									  <a href="{{url('/profile')}}"class="nav-link">    Profile</a>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color:#228899">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php $cats=DB::table('categories')->get()?>
			@foreach($cats as $cat)
          <a class="dropdown-item" href="{{url('category',$cat->id)}}"style="color:#228899">{{ucwords($cat->name)}}</a>
          @endforeach
		  </div>
      </li>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color:#228899">
         Moblia
		</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a  class="nav-link" href="{{url('/old')}}">Old Moblia</a>
        <a class="nav-link"  href="{{url('/new')}}">New Moblia</a>
			</div></li>
			
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color:#228899">
          Type
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php $cats=DB::table('types')->get()?>
			@foreach($cats as $cat)
          <a class="dropdown-item" href="{{url('type',$cat->id)}}">{{ucwords($cat->name)}}</a>
          @endforeach
		  </div>
      </li>
     
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color:#228899">
         Real
		</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a  class="nav-link" href="{{url('/rent')}}">Rent Estate</a>
        <a class="nav-link"  href="{{url('/own')}}">Own Estate</a>
			</div></li>
		 <li class="nav-item">
        <a class="nav-link" href="{{url('/contact')}}" style="color:#228899">Contact</a>
      </li>	
		
	<li class="nav-item">
		<a class="nav-link" href="{{url('/profile')}}"style="color:#228899">Profile</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{url('wishlist')}}"style="color:#228899">Wishlist<span>({{App\Wishlist::count()}})</span></a>
      </li>
		
	
		<li class="nav-item">
		<a  class="nav-link" href="{{url('/cart')}}"style="color:#228899">&nbsp;Cart({{Cart::count()}}&nbsp;items) &nbsp;&nbsp;({{Cart::total()}})</a>
		</li>
		
			 <li class="nav-item"><a class="btn btn-info" style="background-color:#00bbff"  href="{{route('buser.create')}}">Publish Real</a></li>
			&nbsp;
		  <li class="nav-item"><a class="btn btn-info" style="background-color:#f70" href="{{route('muser.create')}}">Publish Moblia</a></li>
    </ul>
	  </div>
  </div>
</nav>