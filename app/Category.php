<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	  //use \Dimsav\Translatable\Translatable;
      protected $guarded=[];
	  //public $translatedAttributes = ['name'];
	
	public function Musers()
	{
		return $this->hasMany('App\Muser');
	}
}
