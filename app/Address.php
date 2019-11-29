<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='address';
	protected $primaryKey='id';
	protected $fillable=['fullname','state','city','country','payment_type','user_id','pincode'];
}
