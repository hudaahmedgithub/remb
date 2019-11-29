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
                    <form method="POST" action="{{url('adminPanel/sitesetting')}}" aria-label="{{ __('Register') }}">

                        @csrf

                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('slug') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" required autofocus>

                                @if ($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namesetting" class="col-md-4 col-form-label text-md-right">{{ __('namesetting') }}</label>

                            <div class="col-md-6">
                                <input id="namesetting" type="text" class="form-control{{ $errors->has('namesetting') ? ' is-invalid' : '' }}" name="namesetting" value="{{ old('namesetting') }}" required>

                                @if ($errors->has('namesetting'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('namesetting') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="value" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="value" required>

                                @if ($errors->has('value'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Setting') }}
                                </button>
								
                            </div>
                        </div>
                    
			
					</form>
@endsection