<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
	 protected $table='operations';
	 protected $guarded=['id'];
     protected $fillable=['type'];
	
	
	public function musers()
	{
		return $this->hasMany('App\Muser');
	}
}
