<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Product;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
class Order extends Model
{
    protected $table='orders';
	protected $primaryKey='id';
	protected $fillable=['total','status','user_id'];
	
	public function orderFields()
	{
		return $this->belongsToMany('App\Product')->withPivot('qty','total');
	}
	public static function createOrder()
	{
		$user=Auth::user();
	$order=Auth::user()->orders()->create(['total'=>Cart::total(),'status'=>'pending']);
		$cartItems=Cart::content();
		foreach($cartItems as $cartItem)
		{
		$order->orderFields()->attach($cartItem->id,['qty'=>$cartItem->qty,'tax'=>Cart::tax(),
		'total'=>$cartItem->total]);	
		}
	}
}




