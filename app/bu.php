<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bu extends Model
{
   protected $table='bus';
   protected $guarded=['id'];
   protected $fillable=['bu_price','bu_rent', 'bu_square','bu_type','bu_small_dis','bu_meta', 'bu_langtuide','bu_latituide','bu_large_dis', 'bu_status','user_id','bu_place','bu_phone','bu_email','bu_floor','bu_name','image','country_id']; 
	
		protected $appends = ['image_path'];


    public function getImagePathAttribute()
    {
        return asset('uploads/bu_images/' . $this->image);

    }
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function owner()
	{
		return $this->belongsTo('App\Owner');
	}
public function statu()
	{
		return $this->belongsTo('App\Statu');
	}
	public function type()
	{
		return $this->belongsTo('App\Type');
	}
	
	public function country()
	{
		return $this->belongsTo('App\Country');
	}
}
