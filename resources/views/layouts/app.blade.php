<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<meta name="user-id" content="{{ Auth()->user()->id ?? '' }}">
    <title>سكريبت موقع عقارات
	
	|@yield('title')
	</title>
	  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script><script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	<link href="{{asset('website/css/bootstrap.min.css')}}" rel="stylesheet" />
<!--<link href="{{asset('website/css/flexslider.css')}}" rel="stylesheet" />-->
<link href="{{asset('website/css/style.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('website/css/font-awesome.min.css')}}">
<!--<script src="{{asset('website/js/jquery.min.js')}}"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'> 
 
</head>
<body id="app" style="direction:rtl">
	<div class="header">
  <div class="container"> <a class="navbar-brand pull-right" href="{{url('/')}}"><i class="fa fa-paper-plane"></i> ONE</a>
    <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="" alt="" /> </a>
      <ul class="nav" id="nav">
        <li class="current"><a href="{{url('/')}}">الرئيسيه</a></li>
        <li><a href="{{route('messages.index')}}">Chat</a></li>
        <li><a href="{{url('/rent')}}">rent</a></li>
        <li><a href="{{url('/own')}}">own</a></li>
		  <li><a href="{{url('/rentm')}}">rent M</a></li>
        <li><a href="{{url('/ownm')}}">own M</a></li>
		  <li><a href="{{route('buser.create')}}">Publish b</a></li>
		  <li><a href="{{route('muser.create')}}">Publish m</a></li>
		   @guest
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">عضويه جديده</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                
                           </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>
									<a href="{{url('/userShowBu')}}">الاعلانات</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        <div class="clear"></div>
      </ul>
		
      <script type="text/javascript" src="{{asset('website/js/responsive-nav.js')}}"></script> 
    </div>
  </div>
</div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            
				

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
	<script src="{{asset('website/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('website/js/image_preview.js') }}"></script>
	<script src="{{asset('website/js/responsive-nav.js')}}"></script>
	 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
