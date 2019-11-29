@extends('admin.layouts.layout')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-3"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{url('adminPanel/user')}}" aria-label="{{ __('Register') }}">
@include('admin.user.form2')
					</form>
@endsection