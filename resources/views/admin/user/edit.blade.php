@extends('admin.layouts.layout')
@section('content')
<br><br>
<section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="{{url('/adminPanel')}}"><i class=" active fa fa-dashboard"></i>الرئيسيه</a></li>
        <li><a class="active" href="{{url('/adminPanel/user')}}">التحكم فى الاعضاء</a></li>
		<li><a class="active" href="{{url('/adminPanel/user/'.$user->id.'edit')}}">التعديل فى الاعضاء</a></li>
        
      </ol>
    </section>

<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-3"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
تعديل على {{$user->name}}
                <div class="card-body">
                  {!! Form::open(['action'=>['UsersController@update',$user->id],'method'=>'POST'])!!}
					 
@include('admin.user.form')
				 {{Form::hidden('_method','PUT')}}	
				{!! Form::close() !!}

@endsection
					
					
					
					
					