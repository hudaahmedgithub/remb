<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
	 protected $table='status';
	 protected $guarded=['id'];
     protected $fillable=['name'];
	
	
    public function bus()
	{
		return $this->hasMany('App\Bu');
	}
}
