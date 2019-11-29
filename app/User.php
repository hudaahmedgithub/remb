<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image',
    ];
	protected $appends=['image_path'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function getImagePathAttribute()
	{
		return asset('uploads/user_images/'.$this->image);
	}
	public function orders()
	{
		return $this->hasmany('App\Order');
	}
	public function messages()
	{
		return $this->hasMany('App\Message');
	}
	
	public function isAdmin()
	{
		return $this->admin;
	}
	
	public function bus()
	{
		return $this->hasMany('App\Bu');
	}
	/*public function orders()
	{
	return $this->hasMany('App\Order','user_id','id');
	}*/
	public function musers()
	{
		return $this->hasMany('App\Muser');
	}
}
