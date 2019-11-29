
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
 <div class="col-md-6">
            {!! Form::text('name',$user->name,['class'=>'form-control'])!!}
               
				@if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<div class="form-group row">
                      <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>
 <div class="col-md-6">
	{!! Form::select("admin",['0'=>'user','1'=>'admin'],null,["class"=>'form-control'])!!}
               
				@if ($errors->has('admin'))
                   <span class="invalid-feedback" role="alert">
                                        
					   <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
                                @endif
                            </div>
	<br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
           {!! Form::text('email',$user->email,['class'=>'form-control'])!!}
@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
             {!! Form::text('password',$user->password,['class'=>'form-control'])!!}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
								
                            </div>
                        </div>
                    
			
                </div>
            </div>
        </div>
    </div>
</div>