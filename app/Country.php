<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   protected $table='countries';
   protected $guarded=[];
  // protected $fillable=['name']; 
	
    public function bus()
	{
		return $this->hasMany('App\Bu');
	}
	  public function musers()
	{
		return $this->hasMany('App\Muser');
	}
}
