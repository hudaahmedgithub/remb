<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muser extends Model
{
	protected $table='musers';
   protected $guarded=['id'];
   protected $fillable=['price','operation_id', 'category_id','small_dis','large_dis', 'status','user_id','bu_place','phone','email','bu_name','image','country_id']; 
	
   protected $appends = ['image_path','profit_percent'];
//profit_percent the win mony

    public function getImagePathAttribute()
    {
        return asset('uploads/bu_images/' . $this->image);

    }
	 public function getProfitPercentAttribute()
    {
		 $profit=$this->sale_price - $this->sale_purchase;
		 $profit_percent=$profit*100/$this->purchase_price;
        return number_format($profit_percent,2);//i win mony with %

    }
		
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
public function category()
	{
		return $this->belongsTo('App\Category');
	}
	public function operation()
	{
		return $this->belongsTo('App\Operation');
	}
	
	public function country()
	{
		return $this->belongsTo('App\Country');
	}
		public function orders()
	{
		return $this->belongsToMany('App\Order','product_order');
	}
}
